@extends('template')
@section('title')
    Tambah User
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Data User</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('save-user')}}" enctype="multipart/form-data" method="post">
                        @csrf
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama"id="">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat"id="">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="">
                                    <option value="">--Select--</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                       <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Telepon</label>
                                <input type="number" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon"id="">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email"id="">
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="gambar" class="form-control" placeholder="Gambar"id="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Simpan</button>
                            </div>
                        </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection