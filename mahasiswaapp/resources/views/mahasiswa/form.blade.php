@extends('main')

@section('title','Form Mahasiswa')

@section('content')
{{-- @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>
@endif --}}
    <form action="{{isset($data)?route("edit.mhs",[$data[0]->nim]):route("simpan.mhs")}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nim">NIM</label>
        <input type="text" class="form-control @error("nim") is-invalid @enderror" name="nim" maxlength="10" value="{{ old("nim",isset($data)?$data[0]->nim:"")}}">
        @error("nim")
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama" value="{{isset($data)?$data[0]->nama:""}}">
        @error("nama")
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror  
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control @error("alamat") is-invalid @enderror" name="alamat" value="{{isset($data)?$data[0]->alamat:""}}">
        @error("alamat")
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" class="form-control @error("telepon") is-invalid @enderror" name="telepon" maxlength="13" value="{{isset($data)?$data[0]->telepon:""}}">
        @error("telepon")
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>
        
        <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
    </form>
    
@endsection