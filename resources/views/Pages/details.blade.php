@extends('layouts.app')

@section('content')
    <div id="content" class="container">
        {{-- Tombol kembali --}}
        <div class="d-flex align-items-center">
            <a href="{{ route('home') }}" class="btn btn-sm">
                <i class="bi bi-arrow-left-short fs-4"></i>
                <span class="fw-bold fs-5">Kembali</span>
            </a>
        </div>

        {{-- Alert pada saat ada pesan sukses yang dikirim dari controller yang berupa session --}}
        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        {{-- Content dari halaman detail untuk menampilkan detail task --}}
        <div class="row my-3">
            <div class="col-8">
                <div class="card" style="height: 80vh;">
                    <div class="card-header d-flex align-items-center justify-content-between overflow-hidden">
                        {{-- Nama task --}}
                        <h3 class="fw-bold fs-4 text-truncate mb-0" style="width: 80%">
                            {{ $task->name }}
                            <span class="fs-6 fw-medium">di {{ $task->list->name }}</span> {{-- Nama list dari task --}}
                        </h3>

                        {{-- Tombol edit --}}
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#editTaskModal">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        {{-- Deskripsi Task --}}
                        <p>
                            {{ $task->description }}
                        </p>
                    </div>
                    <div class="card-footer">
                        {{-- Tombol untuk menghapus task --}}
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" type="button" class="btn btn-sm btn-outline-danger w-100">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="height: 80vh;">
                    <div class="card-header d-flex align-items-center justify-content-between overflow-hidden">
                        <h3 class="fw-bold fs-4 text-truncate mb-0" style="width: 80%">Details</h3>
                    </div>
                    <div class="card-body d-flex flex-column gap-2">
                        {{-- Form untuk mengubah list Task --}}
                        <form action="{{ route('tasks.changeList', $task->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select class="form-select" name="list_id" onchange="this.form.submit()">
                                @foreach ($lists as $list)
                                    <option value="{{ $list->id }}" {{ $list->id == $task->list_id ? 'selected' : '' }}>
                                        {{ $list->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>

                        {{-- Prioritas Task --}}
                        <h6 class="fs-6">
                            Priotitas:
                            <span class="badge text-bg-{{ $task->priorityClass }} badge-pill" style="width: fit-content">
                                {{ $task->priority }}
                            </span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal untuk edit task --}}
    <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            {{-- Form untuk mengedit task --}}
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="modal-content">
                @method('PUT') {{-- Menggunakan method PUT agar tidak ada data yang hilang --}}
                @csrf {{-- Token CSRF untuk mencegah serangan CSRF --}}
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editTaskModalLabel">Edit Task</h1> {{-- Title dari modal --}}
                    {{-- Tombol untuk menutup modal --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Input hidden untuk mengirimkan list_id --}}
                    <input type="text" value="{{ $task->list_id }}" name="list_id" hidden>

                    {{-- Input untuk Nama task --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $task->name }}" placeholder="Masukkan nama list">
                    </div>

                    {{-- Input untuk Deskripsi task --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan deskripsi">{{ $task->description }}</textarea>
                    </div>

                    {{-- Select untuk prioritas task --}}
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-control" name="priority" id="priority">
                            <option value="low" @selected($task->priority == 'low')>Low</option>
                            <option value="medium" @selected($task->priority == 'medium')>Medium</option>
                            <option value="high" @selected($task->priority == 'high')>High</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- Tombol untuk menutup modal --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                    {{-- Tombol untuk mengedit task --}}
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
