<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    //
    protected $table = "tblmatkul";

    protected $fillable = ["nama","jurusan","semester"];
}
