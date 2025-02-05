<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

/**
 * Mengatur tindakan yang berhubungan dengan Task.
 */
class TaskController extends Controller
{
    /**
     * Menampilkan halaman home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Home',
            'lists' => TaskList::all(),
            'tasks' => Task::orderBy('created_at', 'desc')->get(),
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

