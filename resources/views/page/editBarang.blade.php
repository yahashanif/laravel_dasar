@extends('template')
@section('title')
    Edit Barang
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Data Barang</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('save-barang')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kode Obat</label>
                                    <input type="text" value="{{$barang->kode_obat}}" name="kode_obat" id="" class="form-control" placeholder="Kode Obat">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Obat</label>
                                    <input type="text" value="{{$barang->nama_obat}}" name="nama_obat" id="" class="form-control" placeholder="Nama Obat">
                                </div>
                                <div class="form-group">
                                    <label for="">Stok</label>
                                    <input type="number" value="{{$barang->stok}}" name="stok" id="" class="form-control" placeholder="Stok">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Satuan Obat</label>
                                    <select name="satuan" id="" class="form-control">
                                        <option value="pcs" <?= $barang->satuan == 'pcs' ? 'selected' : '' ?>>Pcs</option>
                                        <option value="kotak" <?= $barang->satuan == 'kotak' ? 'selected' : '' ?>>Kotak</option>
                                        <option value="botol" <?= $barang->satuan == 'botol' ? 'selected' : '' ?>>Botol</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga Obat</label>
                                    <input type="text" value="{{$barang->harga}}" name="harga" id="" class="form-control" placeholder="Harga Obat">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success btn-block" id="" value="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection