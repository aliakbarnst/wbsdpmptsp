<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class pengaduan extends Model
{
    use HasFactory;
    public function getDataBaru()
    {
        $data = $this->leftJoin('jenis_pelanggarans','jenis_pelanggarans.id','pengaduans.jenis_pelanggaran_id')
            ->leftJoin('users','users.id','pengaduans.user_id')
            ->leftJoin('statuses','statuses.id','pengaduans.status_id')
            ->where('users.id', Auth::user()->id)
            ->select(
                'pengaduans.id as id',
                'pengaduans.kode_ticket',
                'pengaduans.deskripsi',
                'pengaduans.perlingungan',
                'pengaduans.nama_terduga',
                'pengaduans.nip_terduga',
                'pengaduans.jabatan_terduga',
                'jenis_pelanggarans.nama as jenis_pelanggaran',
                'pengaduans.created_at as tanggal_input',
                'pengaduans.updated_at',
                'statuses.id as status',
                'statuses.nama as nama_status'
                )
            ->orderBy('pengaduans.created_at','desc')
            ->get();
        return $data;
    }

    public function getDataDiterima()
    {
        $data = $this->leftJoin('jenis_pelanggarans','jenis_pelanggarans.id','pengaduans.jenis_pelanggaran_id')
            ->leftJoin('users','users.id','pengaduans.user_id')
            ->leftJoin('statuses','statuses.id','pengaduans.status_id')
            // ->where('users.id', Auth::user()->id)
            ->select(
                'pengaduans.id as id',
                'pengaduans.kode_ticket',
                'pengaduans.deskripsi',
                'pengaduans.perlingungan',
                'pengaduans.nama_terduga',
                'pengaduans.nip_terduga',
                'pengaduans.jabatan_terduga',
                'jenis_pelanggarans.nama as jenis_pelanggaran',
                'pengaduans.created_at as tanggal_input',
                'pengaduans.updated_at',
                'statuses.id as status',
                'statuses.nama as nama_status'
                )
            ->orderBy('pengaduans.created_at','desc')
            ->get();
        return $data;
    }
}
