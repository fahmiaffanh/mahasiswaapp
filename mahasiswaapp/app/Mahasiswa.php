<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = "tblmhs";

    protected $fillable = ["nim","nama","alamat","telepon"];

    protected $primaryKey = "nim";

    protected $keyType = "string";
}
