@extends('main')

@section('title','List')

@section('content')
<div class="card">
    <div class="card-header"><h4>Data Mata Kuliah</h4></div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
                <a href="{{ route('form.matkul') }}" class="btn btn-success float-right mb-2">+</a>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Semester</th>
                    <th colspan="2" width=25%>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nama}}</td>
                    {{-- ubah tulisan kolom jurusan berdasarkan data dari database --}}
                    <td>{{$item->jurusan=="ti"?"Teknik Informatika":"Sistem Informasi"}}</td>
                    <td>{{$item->semester}}</td>
                    <td>
                        <a href="{{route('ubah.matkul',[$item->id])}}" class="btn btn-warning btn-block">Ubah</a>
                    </td>
                <td><a href="{{route('hapus.matkul',[$item->id])}}" class="btn btn-danger btn-block">Hapus</a></td>
                </tr>    
                @endforeach                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Jumlah Mata Kuliah</td>
                    <td colspan="2">{{$data->count()}} Mata Kuliah</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection