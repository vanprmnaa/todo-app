<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

// Controller untuk mengatur tindakan yang berhubungan dengan Task
class TaskController extends Controller
{
    // Menampilkan halaman home
    public function index(Request $request)
    {
        // Mendapatkan query pencarian
        $query = $request->input('query');

        // Kondisi pencarian
        if ($query) {
            // Pada saat query pencarian ada
            // Mendapatkan data task berdasarkan query
            $tasks = Task::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->latest()
                ->get();

            // Mendapatkan data list berdasarkan query
            $lists = TaskList::where('name', 'like', "%{$query}%")
                ->orWhereHas('tasks', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                })
                ->with('tasks')
                ->get();

            // Jika query pencarian kosong atau tidak ada data yang ditemukan
            // Mengambil semua data task
            if ($tasks->isEmpty()) {
                $lists->load('tasks');
            } else {
                // Pada saat query pencarian ada dan ada data yang ditemukan
                // Ambil data task berdasarkan query
                $lists->load(['tasks' => function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                }]);
            }
        } else {
            // Pada saat query pencarian tidak ada atau tidak ada data yang ditemukan ambil semua data
            $tasks = Task::latest()->get();
            $lists = TaskList::with('tasks')->get();
        }

        // Mengirimkan data ke view
        $data = [
            'title' => 'Home', // Judul halaman
            'lists' => $lists, // Data list
            'tasks' => $tasks, // Data task
            'priorities' => Task::PRIORITIES // Prioritas dari model Task
        ];

        // Tampilkan view beserta data
        return view('pages.home', $data);
    }

    // Fungsi/Logika untuk menambahkan task
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'name' => 'required|max:100', // Harus diisi dan Maksimal 100 karakter
            'description' => 'max:255', // Maksimal 255 karakter
            'priority' => 'required|in:low,medium,high', // Harus diisi dan harus salah satu dari low, medium, high
            'list_id' => 'required' // Harus diisi
        ]);

        // Jika data berhasil divalidasi dan lolos maka akan ditambahkan ke database
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,
            'list_id' => $request->list_id
        ]);

        // Setelah data berhasil ditambahkan ke database arahkan kembali ke halaman sebelumnya
        return redirect()->back();
    }

    // Fungsi/Logika untuk mengubah status task
    public function complete($id)
    {
        // Mencari task yang ingin diubah statusnya
        Task::findOrFail($id)->update([
            // Ubah status menjadi selesai
            'is_completed' => true
        ]);

        // Setelah data berhasil diubah arahkan kembali ke halaman sebelumnya
        return redirect()->back();
    }

    // Fungsi/Logika untuk menghapus task
    public function destroy($id)
    {
        // Cari task yang ingin dihapus, jika ketemu hapus, jika tidak tampilkan halaman 404
        Task::findOrFail($id)->delete();

        // Jika task berhasil dihapus arahkan kembali ke halaman home
        return redirect()->route('home');
    }

    // Fungsi/Logika untuk menampilkan halaman details
    public function show($id)
    {
        // Menyiapkan data yang akan dikirim ke halaman details
        $data = [
            'title' => 'Task', // Judul halaman
            'lists' => TaskList::all(), // Data list
            'task' => Task::findOrFail($id), // Data task berdasarkan id
        ];

        // Tampilkan halaman details beserta data
        return view('pages.details', $data);
    }

    // Fungsi/Logika untuk mengubah task
    public function changeList(Request $request, Task $task)
    {
        // Validasi data
        $request->validate([
            'list_id' => 'required|exists:task_lists,id', // Harus diisi dan harus ada di dalam table task_lists
        ]);

        // Ubah list task jika list ditemukan
        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id // Ubah list
        ]);

        // Jika berhasi arahkan kembali kehalaman sebelumnya dan kirim pesan berhasil
        return redirect()->back()->with('success', 'List berhasil diperbarui!');
    }

    // Fungsi/Logika untuk mengubah task
    public function update(Request $request, Task $task)
    {
        // Validasi data
        $request->validate([
            'list_id' => 'required', // Harus diisi
            'name' => 'required|max:100', // Harus diisi dan Maksimal 100 karakter
            'description' => 'max:255', // Maksimal 255 karakter
            'priority' => 'required|in:low,medium,high' // Harus diisi dan harus salah satu dari low, medium, high
        ]);

        // Ubah task yang dipilih
        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id, // Task List tidak di ubah, disertakan karena menggunakan method PUT yang harus mengirimkan semua data jika ingin memperbarui
            'name' => $request->name, // Ubah Task Name jika ada perubahan
            'description' => $request->description, // Ubah Task Description jika ada perubahan
            'priority' => $request->priority // Ubah Task Priority jika ada perubahan
        ]);

        // Arahkan kembali ke halaman sebelumnya beserta mengirimkan pesan berhasil
        return redirect()->back()->with('success', 'Task berhasil diperbarui!');
    }
}
