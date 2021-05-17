<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory,SoftDeletes;
    
    public function getData()
    {
        $data = $this->orderBy('nama','asc')
            ->get();
        return $data;
    }
}
