<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slider;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;

class SliderController extends Controller
{
    private $data;
    private $sliderClass;


    public function __construct()
    {
        $this->sliderClass = new slider;

        $this->data = [
            'category_name' => 'Slider',
            'main_url' => 'slider',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel Slider halaman website';
        return view('dashboard.page.slider.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['page_name'] = 'tambah Slider halaman website';
        return view('dashboard.page.slider.create',$this->data);
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
            'nama_gambar' => 'required',
            'nama_gambar2' => 'required',
            'gambar' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $nama_bersih = bersih($request->nama_gambar,'-');
        $gambar = $request->file('gambar');
        $ext = $gambar->getClientOriginalExtension();
        $destination = public_path('uploads/images/gambar-slider');
        $filename_header = $nama_bersih.rand().".".$ext;
        $gambar->move($destination, $filename_header);

        $this->sliderClass->nama = $request->nama_gambar;
        $this->sliderClass->nama_kedua = $request->nama_gambar2;
        $this->sliderClass->gambar = $filename_header;
        $this->sliderClass->save();

        $this->sliderClass->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = $this->sliderClass->find($id);
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['page_name'] = 'ubah Slider halaman website';
        return view('dashboard.page.slider.edit',$this->data);
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
            'nama_gambar' => 'required',
            'nama_gambar2' => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $update = Slider::find($id);
        if($request->hasFile('gambar'))
        {
            unlink(public_path('uploads/images/gambar-slider/'.$update->gambar));
            $nama_bersih = bersih($request->nama_gambar,'-');
            $gambar = $request->file('gambar');
            $ext = $gambar->getClientOriginalExtension();
            $destination = public_path('uploads/images/gambar-galeri');
            $filename_header = $nama_bersih.rand().".".$ext;
            $gambar->move($destination, $filename_header);
        }
        
        $update->nama = $request->nama_gambar;
        $update->nama_kedua = $request->nama_gambar2;
        if(isset($filename_header)):
        $update->gambar = $filename_header;
        endif;
        $update->save();

        $update ? Toastr::success('Data Berhasil Diubah', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->sliderClass->find($id);
        if(file_exists(public_path('uploads/images/gambar-slider/'.$delete->gambar)))
        {
            unlink(public_path('uploads/images/gambar-slider/'.$delete->gambar));
        }
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->sliderClass->orderBy('created_at','desc')->get();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/slider/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })

            ->addColumn('gambar', function($data)
            {
                $gambar = '<figure class="img-hov-zoomin"><img width="80px" src="'.asset("uploads/images/gambar-slider/".$data->gambar).'" alt="'.$data->gambar.'"></figure>';
                return  $gambar;
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option','gambar','total_gambar'])
            ->make(true);
    }

}

