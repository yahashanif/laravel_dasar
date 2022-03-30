<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index(){
        $data['barang'] = Barang::all();
        return view('page.barang', $data);
    }

    public function inputBarang(Request $request){

        return view('page.inputBarang');
    }

    public function saveBarang(Request $request){
        $validator = Validator::make($request->all(), [
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-user')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = Barang::insert([
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
        ]);

        if($simpan){
            return redirect('barang')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('input-barang')->with('error','Data Gagal disimpan');
        }
    }


}
