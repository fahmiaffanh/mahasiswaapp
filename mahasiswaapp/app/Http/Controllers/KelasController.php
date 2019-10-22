<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Kelas;

class KelasController extends Controller
{
    //
    public function listkelas(){
        $data = Kelas::all();
        return view("kelas.list")->with(compact("data"));
      
    }
    public function simpankelas(Request $request){
        $request->validate([
            'nama' =>'required|max:25',
            'ruang' => 'required|digits_between:1,3|numeric'
        ]);
        Kelas::create($request->except("_token"));

        return redirect()->route('list.kelas');
    }
    public function editkelas(Request $request,$id){
        $request->validate([
            'nama' =>'required|max:25',
            'ruang' => 'required|digits_between:1,3|numeric'
        ]);
        
        Kelas::find($id)->update($request->except("_token"));

        return redirect()->route('list.kelas');
    }
    public function formkelas(){
        return view("kelas.form");
    }
    public function deletekelas($id){
        // DB::table('tblkelas')->where('id',$id)->delete();
        Kelas::destroy($id);
        return redirect()->route('list.kelas');
    }
    public function ubahkelas($id){
        $data = Kelas::find($id);
        return view("kelas.form")->with(compact("data"));
      
    }
}
