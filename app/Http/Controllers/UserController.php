<?php

namespace App\Http\Controllers;

use App\Models\userapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data['user'] = DB::table('userapps')->get();
        // dd($data['user']);
        // $user = userapp::all();
        return view('page.user', $data);
    }

    public function tambahUser()
    {
        return view('page.inputUser');
    }

    public function editUser($id)
    {
        $data['user'] = userapp::where('id', $id)->first();
        return view('page.editUser', $data);
    }

    public function updateUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        if ($validator->fails()) {
                return redirect('edit-user', $id)
                    ->withErrors($validator)
                    ->withInput();
            }
            // dd($id);


        if ($request->file('gambar') == NULL) {

            $simpan = userapp::where('id', $id)->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'jk' => $request->jenis_kelamin,
                'no_telp' => $request->nomor_telepon,
                'email' => $request->email,


            ]);
        } else {
            $fotolama = userapp::find($id)->first();
            if($fotolama->gambar != NULL) {
                unlink('gambar/'.$fotolama->gambar);
            }
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $file->move('gambar/', $fileName);
            $simpan = userapp::where('id', $id)->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'jk' => $request->jenis_kelamin,
                'no_telp' => $request->nomor_telepon,
                'email' => $request->email,
                'gambar' => $fileName


            ]);
        }


        if ($simpan == true) {
            return redirect('user')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect('edit-user', $id)->with('error', 'Data Gagal diupdate');
        }
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'gambar' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-user')
                ->withErrors($validator)
                ->withInput();
        }
        $file = $request->file('gambar');
        $fileName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file->move('gambar/', $fileName);

        $simpan = userapp::insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jk' => $request->jenis_kelamin,
            'no_telp' => $request->nomor_telepon,
            'email' => $request->email,
            'gambar' => $fileName

        ]);


        if ($simpan == true) {
            return redirect('user')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('input-user')->with('error', 'Data Gagal Disimpan');
        }
    }

    public function deleteUser($id)
    {
        $delete = userapp::find($id);
        $delete->delete();

        if ($delete) {
            return redirect('user')->with('success', 'Sukses Delete user');
        } else {
            return redirect('user')->with('error', 'Gagal Delete user');
        }
    }
}
