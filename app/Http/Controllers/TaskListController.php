<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

/**
 * Mengatur tindakan yang berhubungan dengan Task List.
 */
class TaskListController extends Controller
{
    /**
     * Membuat task list baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        TaskList::create([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }

    /**
     * Menghapus task list.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TaskList::findOrFail($id)->delete();

        return redirect()->back();
    }
}

