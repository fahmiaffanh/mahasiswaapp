<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = "tblkelas";

    protected $fillable = ["nama","jurusan","semester","ruang","sesi"];

    public function getJurusanAttribute($value){
        $namajurusan = "";
        if($value=="si"){
            $namajurusan = "Sistem Informasi";
        }else{
            $namajurusan = "Teknik Informatika";
        }

        return $namajurusan;
    }

    public function getSemesterAttribute($value){
        $namasemester = "";
        switch ($value){
            case 1:
                $namasemester = "I";
                break;
            case 2:
                $namasemester = "II";
                break;
            case 3:
                $namasemester = "III";
                break;
            case 4:
                $namasemester = "IV";
                break;
            case 5:
                $namasemester = "V";
                break;
            case 6:
                $namasemester = "VI";
                break;
            case 7:
                $namasemester = "VII";
                break;
            case 8:
                $namasemester = "VIII";
                break;
            default:
                $namasemester="NA";
                break;
        }

        return $namasemester;
    }
}
