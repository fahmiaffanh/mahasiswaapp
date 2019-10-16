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
    

    public function simpanmhs(Request $request){
        DB::table('tblmhs')->insert(
            ['nim'=>$request->input('nim'),
            'nama'=>$request->input('nama'),
            'alamat'=>$request->input('alamat'),
            'telepon'=>$request->input('telepon')]                   
        );

        return redirect()->route('list.mhs');
    }
    

    public function editmhs(Request $request,$id){
        DB::table('tblmhs')->where('nim',$id)->update([
        'nim'=>$request->input('nim'),
        'nama'=>$request->input('nama'),
        'alamat'=>$request->input('alamat'),
        'telepon'=>$request->input('telepon')]);

        return redirect()->route('list.mhs');
    }
    

    public function formmhs(){
        return view("mahasiswa.form");
    }
    

    public function deletemhs($nim){
        DB::table('tblmhs')->where('nim',$nim)->delete();
        return redirect()->route('list.mhs');
    }
    

    public function ubahmhs($id){
        $data = DB::table("tblmhs")->where('id',$id)->get();
        return view("matkul.form")->with(compact("data"));
      
    }
    
}
