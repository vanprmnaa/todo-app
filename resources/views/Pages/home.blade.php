@extends('layouts.app')

@section('content')
    {{-- Bagian konten utama --}}
    <div id="content" class="overflow-y-hidden overflow-x-hidden">
        {{-- Input Pencarian --}}
        <div class="row mb-3">
            <div class="col-4 mx-auto">
                <form action="{{ route('home') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Cari daftar atau tugas..."
                            value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search fs-6"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Cek jika tidak ada daftar tugas --}}
        @if ($lists->count() == 0)
            <div class="d-flex flex-column align-items-center">
                <p class="fw-bold text-center text-danger">Belum ada tugas yang ditambahkan</p>
                <button type="button" class="btn btn-sm d-flex align-items-center gap-2 btn-outline-danger"
                    style="width: fit-content;">
                    <i class="bi bi-plus-square fs-3"></i> Tambah
                </button>
            </div>
        @endif
        <div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden">
            {{-- Iterasi melalui setiap daftar --}}
            @foreach ($lists as $list)
                <div class="card flex-shrink-0" style="width: 18rem; max-height: 80vh;">
                    <div class="card-header d-flex align-items-center justify-content-between bg-danger text-white">
                        <h4 class="card-title">{{ $list->name }}</h4>
                        {{-- Form untuk menghapus daftar --}}
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm p-0 text-white">
                                <i class="bi bi-trash fs-5 text-light"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                        {{-- Iterasi melalui setiap tugas dalam daftar --}}
                        @foreach ($tasks as $task)
                            @if ($task->list_id == $list->id)
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex flex-column justify-content-center gap-2">
                                                <p
                                                    class="fw-bold lh-1 m-0 {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                                    {{ $task->name }}
                                                </p>
                                                <span class="badge text-bg-{{ $task->priorityClass }} badge-pill"
                                                    style="width: fit-content">
                                                    {{ $task->priority }}
                                                </span>
                                            </div>
                                            {{-- Form untuk menghapus tugas --}}
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm p-0">
                                                    <i class="bi bi-x-circle text-danger fs-5"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-truncate">
                                            {{ $task->description }}
                                        </p>
                                    </div>
                                    {{-- Jika tugas belum selesai, tampilkan tombol selesai --}}
                                    @if (!$task->is_completed)
                                        <div class="card-footer">
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-danger w-100">
                                                    <span class="d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-check fs-5"></i>
                                                        Selesai
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                        {{-- Tombol untuk menambah tugas baru ke modal --}}
                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-plus fs-5"></i>
                                Tambah
                            </span>
                        </button>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                    </div>
                </div>
            @endforeach
            {{-- Tombol untuk menambah daftar baru ke modal --}}
            <button type="button" class="btn btn-outline-danger flex-shrink-0" style="width: 18rem; height: fit-content;"
                data-bs-toggle="modal" data-bs-target="#addListModal">
                <span class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-plus fs-5"></i>
                    Tambah
                </span>
            </button>
        </div>
    </div>
@endsection
