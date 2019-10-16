@extends('main')

@section('title','Form Todo')

@section('content')
    <form action="{{isset($data)?route("edit.mhs",[$data[0]->nim]):route("simpan.mhs")}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nim">NIM</label>
        <input type="text" class="form-control" name="nim" maxlength="10" value="{{ isset($data)?$data[0]->nim:""}}">
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{isset($data)?$data[0]->nama:""}}">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="{{isset($data)?$data[0]->alamat:""}}">
        </div>
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" class="form-control" name="telepon" maxlength="13" value="{{isset($data)?$data[0]->telepon:""}}">
        </div>
        
        <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
    </form>
    
@endsection