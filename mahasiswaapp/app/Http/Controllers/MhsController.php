<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MhsController extends Controller
{
    //
    public function home(){
        return view("home");
    }
    public function listmhs(){
        $data = DB::table("tblmhs")->get();
        return view("mahasiswa.list")->with(compact("data"));
      
    }

    public function simpanform(Request $request){
        DB::table('tblmhs')->insert(
            ['nim'=>$request->input('nim'),
            'nama'=>$request->input('nama'),
            'alamat'=>$request->input('alamat'),
            'telepon'=>$request->input('telepon')]
        
            
        );

        return redirect()->route('list.mhs');
    }

    public function editform(Request $request,$id){
        DB::table('tblmhs')->where('nim',$id)->update([
        'nim'=>$request->input('nim'),
        'nama'=>$request->input('nama'),
        'alamat'=>$request->input('alamat'),
        'telepon'=>$request->input('telepon')]);

        return redirect()->route('list.mhs');
    }
    public function formmhs(){
        

        return view("mahasiswa.form",[
                "data"=>[
                    [
                        "nim" => "",
                        "nama"=>"",
                        "alamat"=>""                  
                ]
                    ],["edit"=>0]]);
    }

    public function deletemhs($nim){
        DB::table('tblmhs')->where('nim',$nim)->delete();
        return redirect()->route('list.mhs');
    }

    public function ubahmhs($nim){
        $data = DB::table("tblmhs")->where('nim',$nim)->get();
        $edit = 1;
        return view("mahasiswa.form")->with(compact("data","edit"));
      
    }
}
