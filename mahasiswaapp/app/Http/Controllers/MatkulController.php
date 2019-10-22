<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Matkul;

class MatkulController extends Controller
{
    //
    public function listmatkul(){
        $data = Matkul::all();
        return view("matkul.list")->with(compact("data"));
      
    }
    public function simpanmatkul(Request $request){
        $request->validate([
            'nama' =>'required|max:25'
        ]);

        Matkul::create($request->except("_token"));

        return redirect()->route('list.matkul');
    }
    public function editmatkul(Request $request,$id){
        $request->validate([
            'nama' =>'required|max:25'
        ]);

        Matkul::find($id)->update($request->except("_token"));

        return redirect()->route('list.matkul');
    }
    public function formmatkul(){
        return view("matkul.form");
    }
    public function deletematkul($id){
        Matkul::destroy($id);
        return redirect()->route('list.matkul');
    }
    public function ubahmatkul($id){
        $data = Matkul::find($id);
        return view("matkul.form")->with(compact("data"));
      
    }
    
}
