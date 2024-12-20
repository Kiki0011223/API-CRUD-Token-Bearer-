<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;

class CRUDController extends Controller
{
    public function tampil()
    {
        // Mengambil semua data dari tabel mahasiswa$mahasiswa
        $mahasiswas = Mahasiswa::all();

        // Mengirim data ke API
        return response()->json($mahasiswas,200);  
       //print_r($mahasiswa);

    }

// Memperbarui data mahasiswa
    public function update(Request $request, $id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'fakultas' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:mahasiswas,email,' . $id,
        ]);

        $mahasiswas->update($request->all());

        return response()->json('Data mahasiswa berhasil diperbarui!');
    }

     // Menyimpan data mahasiswa baru
     public function add(Request $request)
     {
         // Validasi data input
         $request->validate([
             'name' => 'required|string|max:255',
             'nim' => 'required|string|max:20',
             'fakultas' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:mahasiswas',
         ]);
 
         // Menyimpan data mahasiswa baru
         Mahasiswa::create([
             'name' => $request->name,
             'nim' => $request->nim,
             'fakultas' => $request->fakultas,
             'email' => $request->email,
         ]);
 
         return response()->json('Data Berhasil di tambahkan');
     }

    public function delete($id)
    {
        $mahasiswas = Mahasiswa::find($id);
    
        if (!$mahasiswas) {
            return response()->json('error', 'MahasiswaTidakAda');
        }
    
        $mahasiswas->delete();
        return response()->json('Data Sudah Dihapus');
    }
}