@extends('main')

@section('title','Form Mata Kuliah')

@section('content')
    <form action="{{isset($data)?route("edit.matkul",[$data->id]):route("simpan.matkul")}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama" value="{{old("nama",isset($data)?$data->nama:"")}}">
        @error("nama")
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            {{-- user memilih jurusan dari pilihan yang memiliki nilai ti dan si --}}
            <select name="jurusan" id="jurusan"
                class="form-control">
                <option value="ti" {{ isset($data) && $data->jurusan=="Teknik Informatika"?"selected":'' }}>
                    Teknik Informatika</option>
                    <option value="si" {{ isset($data) && $data->jurusan=="Sistem Informasi"?"selected":'' }}>
                    Sistem Informasi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <select name="semester" id="semester"
                class="form-control">
                @for ($i = 1; $i <= 8; $i++)
                <option value="{{$i}}" {{isset($data)&&$data->semester==$i?"selected":""}}>{{$i}}</option>
                @endfor
                                    
            </select>
        </div>
        
        <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
    </form>
    
@endsection