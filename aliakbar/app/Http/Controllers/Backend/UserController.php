<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LevelUser;
use Carbon\Carbon;
use DataTables;
use Toastr;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    private $data;
    private $UserClass;
    private $LevelUserClass;
    private $subbagClass;
    private $kabupatenClass;

    public function __construct()
    {
        $this->UserClass = new User;
        $this->LevelUserClass = new LevelUser;
        $this->data = [
            'category_name' => 'User',
            'main_url' => 'user',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data user';
        return view('dashboard.page.user.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['subbag'] = $this->subbagClass->orderBy('nama','asc')->get();
        $this->data['kabupaten'] = $this->kabupatenClass->orderBy('nama','asc')->get();
        $this->data['level'] = $this->LevelUserClass->orderBy('nama','asc')->get();
        $this->data['page_name'] = 'tambah data user';
        return view('dashboard.page.user.create',$this->data);
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
            'nama' => 'required|unique:users,nama,NULL,id,deleted_at,NULL',
            'username' => 'required|unique:users,username,NULL,id,deleted_at,NULL',
            'password' => 'required|min:6',
            'password_konfirmasi' => 'required|same:password',
            'email' => 'required|unique:users,email,NULL,id,deleted_at,NULL',
            'level'=> 'required',
            'telegram'=> 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $this->UserClass->nama = $request->nama;
        $this->UserClass->email = $request->email;
        $this->UserClass->username = $request->username;
        $this->UserClass->level_user_id = $request->level;
        $this->UserClass->id_telegram = $request->telegram;
        $this->UserClass->password = Hash::make($request->password);
        $this->UserClass->save();

        $this->UserClass->id ? Toastr::success('Data Berhasil Disimpan', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/user');
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
     * Show the form for 
     ing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = $this->UserClass->find($id);
        $this->data['level'] = $this->LevelUserClass->orderBy('nama','asc')->get();
        $this->data['edit'] = $edit;
        $this->data['update_name'] = $edit->nama;
        $this->data['page_name'] = 'ubah data user';
        return view('dashboard.page.user.edit',$this->data);
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
            'username' => 'required',
            'email' => 'required|',
            'level'=> 'required',
            'telegram'=> 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $update = User::find($id);
        $update->nama = $request->nama;
        $update->username = $request->username;
        $update->email = $request->email;
        $update->level_user_id = $request->level;
        $update->id_telegram = $request->telegram;
        $update->save();
        $update ? Toastr::success('Data Berhasil Diubah', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('dashboard/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->UserClass->find($id);
        $delete->delete();
        return $delete ? 1 : 0;
    }

    public function table(Request $request)
    {   
        
        $data = $this->UserClass->getData();
            return DataTables::of($data)
            ->addColumn('option', function($data)
            {
                $button = '<a href="'.url('dashboard/user/edit/'.$data->id).'" class="btn btn-warning mb-2 mr-2 btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                $button .= '<button data-id="'.$data->id.'" data-nama="'.$data->nama.'" class="btn btn-danger mb-2 mr-2 btn-sm" data-toggle="modal" data-target="#ModalHapus" ><i class="fa fa-trash" aria-hidden="true"></i></button>';
                return  $button;
            })

            ->addColumn('tanggal', function($data)
            {
            return  Carbon::parse($data->updated_at)->diffForHumans();
            })

            ->addIndexColumn()
            ->rawColumns(['tanggal','option',])
            ->make(true);
    }
}
