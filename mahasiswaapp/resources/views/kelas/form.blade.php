@extends('main')

@section('title','Form Kelas')

@section('content')
    <form action="{{isset($data)?route("edit.kelas",[$data[0]->id]):route("simpan.kelas")}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama" value="{{old("nama",isset($data)?$data[0]->nama:"")}}">
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
                <option value="ti"
                    {{isset($data)&&$data[0]->jurusan=="ti"?"SELECTED":""}}>
                    Teknik Informatika</option>
                <option value="si"
                {{isset($data)&&$data[0]->jurusan=="si"?"SELECTED":""}}>
                    Sistem Informasi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <select name="semester" id="semester"
                class="form-control">
                @for ($i = 1; $i <= 8; $i++)
                <option value="{{$i}}" {{isset($data)&&$data[0]->semester==$i?"SELECTED":""}}>{{$i}}</option>
                @endfor                
            </select>
        </div>
        <div class="form-group">
            <label for="ruang">Ruang</label>
            <input type="number" class="form-control @error("ruang") is-invalid @enderror" name="ruang" value="{{old("ruang",isset($data)?$data[0]->ruang:"")}}">
        @error("ruang")
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>
        <div class="form-group">
            <label for="sesi">Sesi</label>
            <select name="sesi" id="sesi"
                class="form-control">
                <option value="pagi"
                    {{isset($data)&&$data[0]->sesi=="pagi"?"SELECTED":""}}>
                    Pagi</option>
                <option value="sore"
                {{isset($data)&&$data[0]->sesi=="sore"?"SELECTED":""}}>
                    Sore</option>
            </select>
        </div>
        
        <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
    </form>
    
@endsection