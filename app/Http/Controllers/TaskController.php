<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskList;

/**
 * Mengatur tindakan yang berhubungan dengan Task.
 */

class TaskController extends Controller
{

    // Menampilkan detail tugas berdasarkan ID
    public function show($id)
    {
        $task = Task::findOrFail($id);
        $title = $task->title; // Menggunakan judul tugas sebagai title halaman
        return view('tasks.show', compact('task', 'title'));
    }

    /**
     * Menampilkan halaman home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        // Filter daftar tugas yang cocok dengan pencarian
        $lists = TaskList::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%");
        })->get();

        // Filter tugas yang cocok dengan pencarian
        $tasks = Task::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%");
        })->orderBy('created_at', 'desc')->get();

        // Jika pencarian dilakukan untuk tugas, kita hanya mengambil daftar yang memiliki tugas yang cocok
        if ($search) {
            $taskListIds = $tasks->pluck('list_id')->unique(); // Ambil ID daftar yang memiliki tugas sesuai pencarian
            $lists = TaskList::whereIn('id', $taskListIds)->get();
        }

        $data = [
            'title' => 'Home',
            'lists' => $lists,
            'tasks' => $tasks,
            'priorities' => Task::PRIORITIES
        ];

        return view('pages.home', $data);
    }


    /**
     * Membuat task baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:100',
            'priority' => 'required|in:low,medium,high',
            'list_id' => 'required'
        ]);

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,
            'list_id' => $request->list_id
        ]);

        return redirect()->back();
    }

    /**
     * Mengubah status task menjadi selesai.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function complete($id)
    {
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        return redirect()->back();
    }

    /**
     * Menghapus task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect()->back();
    }
}
