@extends('main')

@section('title','List')

@section('content')
<div class="card">
    <div class="card-header"><h4>Data Kelas</h4></div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
                <a href="{{ route('form.kelas') }}" class="btn btn-success float-right mb-2">+</a>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Semester</th>
                    <th>Ruang</th>
                    <th>Sesi</th>
                    <th colspan="2" width=25%>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->jurusan}}</td>
                    <td>{{$item->semester}}</td>
                    <td>{{$item->ruang}}</td>
                    <td>{{$item->sesi}}</td>
                    <td>
                        <a href="{{route('ubah.kelas',[$item->id])}}" class="btn btn-warning btn-block">Ubah</a>
                    </td>
                <td><a href="{{route('hapus.kelas',[$item->id])}}" class="btn btn-danger btn-block">Hapus</a></td>
                </tr>    
                @endforeach                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">Jumlah Kelas</td>
                    <td colspan="2">{{$data->count()}} Kelas</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection