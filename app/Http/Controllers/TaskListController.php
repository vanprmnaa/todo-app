<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

/**
 * Mengatur tindakan yang berhubungan dengan Task List.
 */
class TaskListController extends Controller
{
    // Fungsi/Logika untuk menambahkan List
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'name' => 'required|max:100', // Harus diisi dan Maksimal 100 karakter
        ]);

        // Tambahkan jika data ke database jika berhasil divalidasi
        TaskList::create([
            'name' => $request->name,
        ]);

        // Kembali ke halaman sebelumnya jika data berhasil ditambahkan
        return redirect()->back();
    }

    // Fungsi/Logika untuk menghapus List
    public function destroy($id)
    {
        // Cari List yang ingin dihapus, jika ketemu hapus, jika tidak tampilkan halaman 404
        TaskList::findOrFail($id)->delete();

        // Jika List berhasil dihapus arahkan kembali ke halaman sebelumnya
        return redirect()->back();
    }
}
