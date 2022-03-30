@extends('template')
@section('title')
    Data Barang
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h3>Data Barang</h3>
                </div>
                <div class="float-right">
                    <a href="{{ route('input-barang') }}" class="btn btn-info btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $i => $data)
                            <tr>
                                <th>{{$i+1}}</th>
                                <th>{{$data->kode_obat}}</th>
                                <th>{{$data->nama_obat}}</th>
                                <th>{{$data->stok}}</th>
                                <th>{{$data->satuan}}</th>
                                <th>{{$data->harga}}</th>
                                <th>
                                    <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fa fa-trash"></i></a>
                                </th>
                            </tr>
                        @endforeach
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