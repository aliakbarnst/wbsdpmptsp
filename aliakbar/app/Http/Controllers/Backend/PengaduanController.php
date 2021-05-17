<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pengaduan;
use App\Models\jenisPelanggaran;
use App\Models\status;
use App\Models\lampiran;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;
use DB;

class PengaduanController extends Controller
{

    private $data;
    private $PengaduanClass;
    private $JenisPelanggaranClass;
    private $LampiranClass;
    public function __construct()
    {
        $this->PengaduanClass = new pengaduan;
        $this->JenisPelanggaranClass = new jenisPelanggaran;
        $this->LampiranClass = new lampiran;
        $this->data = [
            'category_name' => 'Pengaduan',
            'main_url' => 'pengaduan',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'Daftar Pengaduan';
        return view('dashboard.page.pengaduan.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['jenis_pelanggaran'] = $this->JenisPelanggaranClass->orderBy('id','asc')->get();
        $this->data['page_name'] = 'Pengaduan Baru';
        return view('dashboard.page.pengaduan.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_terduga' => 'required',
            'jenis_pelanggaran' => 'required',
            'deskripsi_pelanggaran' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $this->PengaduanClass->user_id  = Auth::user()->id;
        $this->PengaduanClass->jenis_pelanggaran_id  =  $request->jenis_pelanggaran;
        $this->PengaduanClass->kode_ticket = generateRandomString();
        $this->PengaduanClass->deskripsi = $request->deskripsi_pelanggaran;
        $this->PengaduanClass->perlingungan = ($request->perlindungan_fisik) ? 1:0;
        $this->PengaduanClass->nama_terduga = $request->nama_terduga;
        $this->PengaduanClass->nip_terduga = $request->nip_terduga;
        $this->PengaduanClass->status_id = 1;
        $this->PengaduanClass->jabatan_terduga = $request->jabatan_terduga;   
        $this->PengaduanClass->save();
        
       
        $hitungFile = count($request->nama_file);
       
        $id_pengaduan = $this->PengaduanClass->id;
        if($hitungFile >= 1 && $request->nama_file[0] != '')
        {
            for($i=0;$i<$hitungFile;$i++)
            {
                $file = $request->file('file')[$i];
                $nama_file = bersih($request->nama_file[$i]).'-'.date('d-m-Y-H-i-s').'.pdf';
                $file->move(public_path('uploads/lampiran'),$nama_file);

                $saveFile = new lampiran;
                $saveFile->pengaduan_id = $id_pengaduan;
                $saveFile->nama = $request->nama_file[$i];
                $saveFile->file = $nama_file;
                $saveFile->save();
            }
        }
        telegramAdmin();
        $jenisP = DB::table('jenis_pelanggarans')->where('id', $this->PengaduanClass->jenis_pelanggaran_id)->first();
        smsPemohon(Auth::user()->nope,$this->PengaduanClass->kode_ticket,$this->PengaduanClass->nama_terduga,$jenisP->nama);

        $this->PengaduanClass->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/pengaduan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = $this->PengaduanClass->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->kode_ticket;
        $this->data['page_name'] = 'ubah pengaduan';
        $this->data['jenis_pelanggaran'] = $this->JenisPelanggaranClass->orderBy('id','asc')->get();
        return view('dashboard.page.pengaduan.edit',$this->data);
    }

    public function detail($id)
    {
        $edit = $this->PengaduanClass->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->kode_ticket;
        $this->data['page_name'] = 'ubah pengaduan';
        $this->data['jenis_pelanggaran'] = $this->JenisPelanggaranClass->orderBy('id','asc')->get();
        $this->data['lampiran'] = $this->LampiranClass->where('pengaduan_id',$id)->orderBy('id','asc')->get();
        return view('dashboard.page.pengaduan.detail',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
  
        $hitungFile = count($request->nama_file);
        
        $id_berita = $id;
        if($hitungFile >= 1 && $request->nama_file[0] != '')
        {
            for($i=0;$i<$hitungFile;$i++)
            {
                $file = $request->file('file')[$i];
                $nama_file = bersih($request->nama_file[$i]).'-'.date('d-m-Y-H-i-s').'.pdf';
                $file->move(public_path('uploads/lampiran'),$nama_file);

                $saveFile = new lampiran;
                $saveFile->pengaduan_id = $id;
                $saveFile->nama = $request->nama_file[$i];
                $saveFile->file = $nama_file;
                $saveFile->save();
            }
        }
        
        $saveFile ? Toastr::success('Data Berhasil Diubah', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/pengaduan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $data = $this->LampiranClass->find($id);
        
        $file = $this->LampiranClass->where('pengaduan_id',$id)->get();
        foreach($file as $key)
        {
            unlink(public_path('uploads/pengaduan/'.$key->file));
            $del = $this->LampiranClass->find($key->id);
            $del->delet();
        }
        

        $data->delete();
        return $data ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
            $data = $this->PengaduanClass->getDataBaru();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/pengaduan/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<a href="'.url('dashboard/pengaduan/detail/'.$data->id).'" class="btn btn-primary mb-2 mr-2 btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                // $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })
            ->addColumn('tanggal_surat', function($data)
            {
            return  tgl_indo($data->tanggal_surat);
            })

            ->addColumn('tanggal_input', function($data)
            {
            return  tgl_indo($data->tanggal_input);
            })
            ->addColumn('status', function($data)
            {
            if($data->status ==1){
                return '<span class="badge badge-danger">'.$data->nama_status.'</span>';
            } else if($data->status ==2){
                return '<span class="badge badge-primary">'.$data->nama_status.'</span>';
            }else if($data->status ==3){
                return '<span class="badge badge-info">'.$data->nama_status.'</span>';
            }else if($data->status ==4){
                return '<span class="badge badge-dark">'.$data->nama_status.'</span>';
            }else if($data->status ==5){
                return '<span class="badge badge-secondary">'.$data->nama_status.'</span>';
            }else if($data->status ==6){
                return '<span class="badge badge-success">'.$data->nama_status.'</span>';
            }else if($data->status ==7){
                return '<span class="badge badge-light">'.$data->nama_status.'</span>';
            }
            
            })

            ->addColumn('perlindungan_fisik', function($data)
            {
                if($data->perlingungan ==1){
                    return '<span class="badge badge-danger">Permohonan Perlindungan Fisik</span>';
                } else if($data->perlingungan ==0){
                    return '<span class="badge badge-success">Tidak Ada Permohonan Perlindungan Fisik</span>';
                }
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','tanggal_surat','tanggal_input','option','perlindungan_fisik','status'])
            ->make(true);
    }

    public function tableFile(Request $request,$id)
    {   
        
        $data = $this->LampiranClass->where('pengaduan_id',$id)->get();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></a>';
                return  $button;
            })

            ->addColumn('file', function($data)
            {
                return '<a href="'.asset('/uploads/lampiran/'.$data->file).'" target="_blank" class="btn btn-primary mb-2 mr-2 btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Lihat Dokumen</a>';
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','file'])
            ->make(true);
    }
}
