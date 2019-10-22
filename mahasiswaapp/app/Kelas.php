<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = "tblkelas";

    protected $fillable = ["nama","jurusan","semester","ruang","sesi"];
}
