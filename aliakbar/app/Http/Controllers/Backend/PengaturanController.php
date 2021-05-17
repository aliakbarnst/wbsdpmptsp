<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaturan;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;


class PengaturanController extends Controller
{
    private $data;
    private $PengaturanClass;

    public function __construct()
    {
        $this->PengaturanClass = new Pengaturan;

        $this->data = [
            'category_name' => 'Pengaturan',
            'main_url' => 'pengaturan',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data pengaturan';
        return view('dashboard.page.pengaturan.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['page_name'] = 'tambah data pengaturan';
        return view('dashboard.page.pengaturan.create',$this->data);
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
            'nama' => 'required|unique:pengaturans,nama,NULL,id,deleted_at,NULL',
            'alamat' => 'required',
            'telpon' => 'required',
            'email' => 'required|email|unique:pengaturans,email',
            'latitude' => 'required',
            'longitude' => 'required',
            'logo' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $nama_bersih = bersih($request->nama,'-');

        if($request->file('logo'))
        {
            $logo = $request->file('logo');
            $ext = $logo->getClientOriginalExtension();
            $destination = public_path('uploads/images/pengaturan');
            $filename_header = $nama_bersih.".".$ext;
            $logo->move($destination, $filename_header);
        }
        

        $this->PengaturanClass->nama = $request->nama;
        $this->PengaturanClass->alamat = $request->alamat;
        $this->PengaturanClass->telpon = $request->telpon;
        $this->PengaturanClass->email = $request->email;
        $this->PengaturanClass->latitude = $request->latitude;
        $this->PengaturanClass->longitude = $request->longitude;
        $this->PengaturanClass->logo = $filename_header ; 
        $this->PengaturanClass->youtube = $request->youtube;
        $this->PengaturanClass->facebook = $request->facebook;
        $this->PengaturanClass->instagram = $request->instagram;
        $this->PengaturanClass->twitter = $request->twitter;
        $this->PengaturanClass->save();

        $this->PengaturanClass->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/pengaturan');
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
        $edit = $this->PengaturanClass->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['page_name'] = 'ubah data pengaturan';
        return view('dashboard.page.pengaturan.edit',$this->data);
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
            'email' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $nama_bersih = bersih($request->nama,'-');

        if($request->file('logo'))
        {
            $logo = $request->file('logo');
            $ext = $logo->getClientOriginalExtension();
            $destination = public_path('uploads/images/pengaturan');
            $filename_header = $nama_bersih.".".$ext;
            $logo->move($destination, $filename_header);
        }
        
        $update = Pengaturan::find($id);
        $update->nama = $request->nama;
        $update->alamat = $request->alamat;
        $update->telpon = $request->telpon;
        $update->email = $request->email;
        $update->latitude = $request->latitude;
        $update->longitude = $request->longitude;
        if(isset($filename_header)):
            $update->logo = $filename_header;
        endif;
        $update->youtube = $request->youtube;
        $update->facebook = $request->facebook;
        $update->instagram = $request->instagram;
        $update->twitter = $request->twitter;
        $update->save();
        $update ? Toastr::success('Data Berhasil Diubah', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/pengaturan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->PengaturanClass->find($id);
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->PengaturanClass->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/pengaturan/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('logo', function($data)
            {
                $logo = '<figure class="img-hov-zoomin"><img src="'.asset("uploads/images/pengaturan/".$data->logo).'" alt="'.$data->logo.'"></figure>';
                return  $logo;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','link_terkait','logo'])
            ->make(true);
    }
}
