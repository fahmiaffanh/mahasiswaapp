<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    //
    public function listkelas(){
        $data = DB::table("tblkelas")->get();
        return view("kelas.list")->with(compact("data"));
      
    }
    public function simpankelas(Request $request){
        DB::table('tblkelas')->insert(
            [
            'nama'=>$request->input('nama'),
            'jurusan'=>$request->input('jurusan'),
            'semester'=>$request->input('semester'),
            'ruang'=>$request->input('ruang'),
            'sesi'=>$request->input('sesi')]                   
        );

        return redirect()->route('list.kelas');
    }
    public function editkelas(Request $request,$id){
        DB::table('tblkelas')->where('id',$id)->update([
        'nama'=>$request->input('nama'),
        'jurusan'=>$request->input('jurusan'),
        'semester'=>$request->input('semester'),
        'ruang'=>$request->input('ruang'),
        'sesi'=>$request->input('sesi')]);

        return redirect()->route('list.kelas');
    }
    public function formkelas(){
        return view("kelas.form");
    }
    public function deletekelas($id){
        DB::table('tblkelas')->where('id',$id)->delete();
        return redirect()->route('list.kelas');
    }
    public function ubahkelas($id){
        $data = DB::table("tblkelas")->where('id',$id)->get();
        return view("kelas.form")->with(compact("data"));
      
    }
}
