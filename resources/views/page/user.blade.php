@extends('template')
@section('title')
    Data User
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h3>Data User</h3>
                </div>
                <div class="float-right">
                    <a href="{{ route('input-user') }}" class="btn btn-info btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Gambar</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $i => $isi)
                                <tr>
                                    <th>{{$i+1}}</th>
                                    <th>{{$isi->nama}}</th>
                                    <th>{{$isi->no_telp}}</th>
                                    <th>{{$isi->alamat}}</th>
                                    <th>{{$isi->email}}</th>
                                    <th><img src="{{asset('gambar/'.$isi->gambar)}}" width="30%" alt=""></th>
                                    <th>{{$isi->jk}}</th>
                                    <th>
                                        <a href="{{route('edit-user',$isi->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('delete-user',$isi->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fa fa-trash"></i></a>
                                    </th>
                                </tr>
                        @endforeach
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- alert dialog --}}
@if (session('success') == true)
{
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{session('success')}}',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
}
    
@endif
@endsection