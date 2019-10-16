@extends('main')

@section('title','List')

@section('content')
<div class="card">
    <div class="card-header"><h4>Data Mahasiswa</h4></div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
                <a href="{{ route('form.mhs') }}" class="btn btn-success float-right mb-2">+</a>
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th colspan="2" width=25%>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->nim}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>{{$item->telepon}}</td>
                    <td>
                        <a href="{{route('ubah.mhs',[$item->nim])}}" class="btn btn-warning btn-block">Ubah</a>
                    </td>
                <td><a href="{{route('hapus.mhs',[$item->nim])}}" class="btn btn-danger btn-block">Hapus</a></td>
                </tr>    
                @endforeach                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Jumlah Mahasiswa</td>
                    <td colspan="2">{{$data->count()}} Mahasiswa</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection