<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mahasiswa;

class MhsController extends Controller
{
    //
    public function home(){
        return view("home");
    }
    public function listmhs(){
        // $data = DB::table("tblmhs")->get();
        $data = Mahasiswa::all();
        return view("mahasiswa.list")->with(compact("data"));
      
    }
    

    public function simpanmhs(Request $request){
        $request->validate([
            'nim' => 'required|digits:10|numeric|unique:tblmhs',
            'nama' =>'required|max:25',
            'alamat' =>'max:100',
            'telepon' => 'digits_between:5,15|numeric'
        ]);

        // DB::table('tblmhs')->insert(
        //     ['nim'=>$request->input('nim'),
        //     'nama'=>$request->input('nama'),
        //     'alamat'=>$request->input('alamat'),
        //     'telepon'=>$request->input('telepon')]                   
        // );

        // $mahasiswa = new Mahasiswa();
        // $mahasiswa->nim = $request->input('nim');
        // $mahasiswa->nama = $request->input('nama');
        // $mahasiswa->alamat = $request->input('alamat');
        // $mahasiswa->telepon = $request->input('telepon');
        // $mahasiswa->save();

        Mahasiswa::create($request->except("_token"));

        return redirect()->route('list.mhs');
    }
    

    public function editmhs(Request $request,$nim){
        $request->validate([
            'nim' => 'required|digits:10|numeric',
            'nama' =>'required|max:25',
            'alamat' =>'max:100',
            'telepon' => 'digits_between:5,15|numeric'
        ]);

        // DB::table('tblmhs')->where('nim',$nim)->update([
        // 'nim'=>$request->input('nim'),
        // 'nama'=>$request->input('nama'),
        // 'alamat'=>$request->input('alamat'),
        // 'telepon'=>$request->input('telepon')]);

        // $data = Mahasiswa::find($nim);
        // $data->nim = $request->nim;
        // $data->nama = $request->nama;
        // $data->alamat = $request->alamat;
        // $data->telepon = $request->telepon;
        // $data->save();
        
        Mahasiswa::find($nim)->update($request->except("_token"));

        return redirect()->route('list.mhs');
    }
    

    public function formmhs(){
        return view("mahasiswa.form");
    }
    

    public function deletemhs($nim){
        // DB::table('tblmhs')->where('nim',$nim)->delete();
        Mahasiswa::destroy($nim);
        return redirect()->route('list.mhs');
    }
    

    public function ubahmhs($nim){
        // $data = DB::table("tblmhs")->where('nim',$id)->get();
        $data = Mahasiswa::find($nim);
        return view("mahasiswa.form")->with(compact("data"));
      
    }
    
}
