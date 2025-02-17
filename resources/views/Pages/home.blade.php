@extends('layouts.app')

@section('content')
    <div id="content" class="overflow-y-hidden overflow-x-hidden">
        {{-- Tampilan pada saat tidak ada data --}}
        @if ($lists->count() == 0)
            <div class="d-flex flex-column align-items-center">
                <p class="text-center fst-italic">Belum ada tugas yang ditambahkan</p>
                <button type="button" class="btn d-flex align-items-center gap-2" style="width: fit-content;"
                    data-bs-toggle="modal" data-bs-target="#addListModal">
                    <i class="bi bi-plus-square fs-1"></i>
                </button>
            </div>
        @endif

        {{-- Form untuk pencarian tasks dan lists --}}
        <div class="row mb-3">
            <div class="col-6 mx-auto">
                <form action="{{ route('home') }}" method="GET" class="d-flex gap-2">
                    <input type="text" class="form-control" name="query" placeholder="Cari tugas atau list..."
                        value="{{ request()->query('query') }}">
                    <button type="submit" class="btn btn-danger">Cari</button>
                </form>
            </div>
        </div>

        {{-- Tampilan pada saat ada data --}}
        <div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden scrollbar-none">
            {{-- Tampilan list --}}
            @foreach ($lists as $list)
                <div class="card flex-shrink-0 blur-lg"
                    style="background: rgba(255, 255, 255, 0.4); width: 18rem; max-height: 80vh; box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="card-title">{{ $list->name }}</h4> {{-- Nama list --}}
                        {{-- Tombol untuk menghapus list --}}
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm p-0">
                                <i class="bi bi-trash fs-5 text-danger"></i>
                            </button>
                        </form>
                    </div>
                    {{-- Tampilan Tasks didalam List --}}
                    <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                        @foreach ($list->tasks as $task)
                            <div class="card bg-dark">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex justify-content-center gap-2">
                                            {{-- Spinner untuk menunjukkan prioritas task pada saat belum selesai dan statusnya high --}}
                                            @if ($task->priority == 'high' && !$task->is_completed)
                                                <div class="spinner-grow spinner-grow-sm text-{{ $task->priorityClass }}"
                                                    role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            @endif
                                            {{-- Nama task --}}
                                            <a href="{{ route('tasks.show', $task->id) }}"
                                                class="fw-bold lh-1 m-0 text-decoration-none text-{{ $task->priorityClass }} {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                                {{ $task->name }}
                                            </a>
                                        </div>
                                        {{-- Tombol untuk menghapus task --}}
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
                                    {{-- Deskripsi Task --}}
                                    <p
                                        class="card-text text-white text-truncate {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                        {{ $task->description }}
                                    </p>
                                </div>
                                @if (!$task->is_completed)
                                    <div class="card-footer">
                                        {{-- Tombol untuk mengubah status task --}}
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
                        @endforeach
                        {{-- Tombol untuk menambahkan task --}}
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-plus fs-5"></i>
                                Tambah
                            </span>
                        </button>
                    </div>

                    {{-- Tampilan jumlah tasks --}}
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                    </div>
                </div>
            @endforeach

            {{-- Tombol untuk menambahkan list jika ada data list --}}
            @if ($lists->count() !== 0)
                <button type="button" class="btn btn-danger flex-shrink-0" style="width: 18rem; height: fit-content;"
                    data-bs-toggle="modal" data-bs-target="#addListModal">
                    <span class="d-flex align-items-center justify-content-center">
                        <i class="bi bi-plus fs-5"></i>
                        Tambah
                    </span>
                </button>
            @endif
        </div>
    </div>
@endsection
