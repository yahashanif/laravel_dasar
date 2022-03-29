@extends('template')
@section('title')
    Edit User
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Data User</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('update-user',$user->id)}}" method="post">
                        @csrf
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" value="{{$user->nama}}" class="form-control" placeholder="Nama"id="">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" value="{{$user->alamat}}"  class="form-control" placeholder="Alamat"id="">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="">
                                    <option value="">--Select--</option>
                                    <option value="Laki-laki" <?= $user->jk == 'Laki-laki' ? 'Selected' : '' ?>>Laki-laki</option>
                                    <option value="Perempuan"  <?= $user->jk == 'Perempuan' ? 'Selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                       <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input type="number" name="nomor_telepon" value="{{$user->no_telp}}"  class="form-control" placeholder="Nomor Telepon"id="">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{$user->email}}"  class="form-control" placeholder="Nama"id="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-block">Edit</button>
                        </div>
                       </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection