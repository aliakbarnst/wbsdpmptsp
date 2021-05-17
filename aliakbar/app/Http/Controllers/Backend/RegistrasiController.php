<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DataTables;
use Toastr;
use File;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;



class RegistrasiController extends Controller
{
    private $UserClass;

    public function __construct()
    {
        $this->UserClass = new User;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['page_name'] = 'tabel data bidang';
        return view('dashboard.auth.registrasi',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'nope' => 'required',
            'username' => 'required|unique:users,username,NULL,id,deleted_at,NULL',
            'password' => 'required|min:6',
            'password_konfirmasi' => 'required|same:password',
            'email' => 'required|unique:users,email,NULL,id,deleted_at,NULL',
            'email_konfirmasi' => 'required|same:email',
            // 'checkbox' =>'boolean'
        ]);
        if ($validator->fails()) {
            Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $this->UserClass->nama = $request->nama_depan;
        $this->UserClass->nama_belakang = $request->nama_belakang;
        $this->UserClass->username = $request->username;
        $this->UserClass->nope = $request->nope;
        $this->UserClass->email = $request->email;
        $this->UserClass->level_user_id = 3;
        $this->UserClass->password = Hash::make($request->password);
        $this->UserClass->save();

        $this->UserClass->id ? Toastr::success('Data Berhasil Disimpan, Silahkan Login', 'Sukses', ["positionClass" => "toast-bottom-right"]) : Toastr::error('Terjadi Kesalahan Saat Menyimpan Data', 'Gagal', ["positionClass" => "toast-bottom-right"]);

        return redirect::to('login');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
