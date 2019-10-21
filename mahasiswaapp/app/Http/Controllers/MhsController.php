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
        $request->validate([
            'nim' => 'required|digits:10|numeric|unique:tblmhs',
            'nama' =>'required|max:25',
            'alamat' =>'max:100',
            'telepon' => 'digits_between:5,15|numeric'
        ]);

        DB::table('tblmhs')->insert(
            ['nim'=>$request->input('nim'),
            'nama'=>$request->input('nama'),
            'alamat'=>$request->input('alamat'),
            'telepon'=>$request->input('telepon')]                   
        );

        return redirect()->route('list.mhs');
    }
    

    public function editmhs(Request $request,$nim){
        $request->validate([
            'nim' => 'required|digits:10|numeric',
            'nama' =>'required|max:25',
            'alamat' =>'max:100',
            'telepon' => 'digits_between:5,15|numeric'
        ]);

        DB::table('tblmhs')->where('nim',$nim)->update([
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
        $data = DB::table("tblmhs")->where('nim',$id)->get();
        return view("mahasiswa.form")->with(compact("data"));
      
    }
    
}
