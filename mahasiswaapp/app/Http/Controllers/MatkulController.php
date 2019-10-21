<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatkulController extends Controller
{
    //
    public function listmatkul(){
        $data = DB::table("tblmatkul")->get();
        return view("matkul.list")->with(compact("data"));
      
    }
    public function simpanmatkul(Request $request){
        $request->validate([
            'nama' =>'required|max:25'
        ]);

        DB::table('tblmatkul')->insert(
            ['id'=>$request->input('id'),
            'nama'=>$request->input('nama'),
            'jurusan'=>$request->input('jurusan'),
            'semester'=>$request->input('semester')]                   
        );

        return redirect()->route('list.matkul');
    }
    public function editmatkul(Request $request,$id){
        $request->validate([
            'nama' =>'required|max:25'
        ]);
        DB::table('tblmatkul')->where('id',$id)->update([
        'nama'=>$request->input('nama'),
        'jurusan'=>$request->input('jurusan'),
        'semester'=>$request->input('semester')]);

        return redirect()->route('list.matkul');
    }
    public function formmatkul(){
        return view("matkul.form");
    }
    public function deletematkul($id){
        DB::table('tblmatkul')->where('id',$id)->delete();
        return redirect()->route('list.matkul');
    }
    public function ubahmatkul($id){
        $data = DB::table("tblmatkul")->where('id',$id)->get();
        return view("matkul.form")->with(compact("data"));
      
    }
    
}
