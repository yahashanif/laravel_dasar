@extends('template')
@section('title')
    Tambah Barang
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
                                    <input type="text" name="kode_obat" id="" class="form-control" placeholder="Kode Obat">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Obat</label>
                                    <input type="text" name="nama_obat" id="" class="form-control" placeholder="Nama Obat">
                                </div>
                                <div class="form-group">
                                    <label for="">Stok</label>
                                    <input type="number" name="stok" id="" class="form-control" placeholder="Stok">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Satuan Obat</label>
                                    <select name="satuan" id="" class="form-control">
                                        <option value="pcs">Pcs</option>
                                        <option value="kotak">Kotak</option>
                                        <option value="botol">Botol</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga Obat</label>
                                    <input type="text" name="harga" id="" class="form-control" placeholder="Harga Obat">
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