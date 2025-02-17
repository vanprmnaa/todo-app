{{-- Modal untuk menambahkan List --}}
<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{-- Form untuk menambahkan list --}}
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content">
            @method('POST') {{-- Method POST untuk menambahkan data --}}
            @csrf {{-- Token CSRF untuk mencegah serangan CSRF --}}
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1> {{-- Title dari modal --}}

                {{-- Tombol untuk menutup modal --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Input untuk Nama list --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
            </div>
            <div class="modal-footer">
                {{-- Tombol untuk menutup modal --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                {{-- Tombol untuk menambahkan list --}}
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal untuk menambahkan Task --}}
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{-- Form untuk menambahkan task --}}
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content">
            @method('POST') {{-- Method POST untuk menambahkan data --}}
            @csrf {{-- Token CSRF untuk mencegah serangan CSRF --}}
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1> {{-- Title dari modal --}}

                {{-- Tombol untuk menutup modal --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Input hidden untuk mengirimkan list_id --}}
                <input type="text" id="taskListId" name="list_id" hidden>

                {{-- Input untuk Nama task --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>

                {{-- Input untuk Deskripsi task --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan deskripsi"></textarea>
                </div>

                {{-- Select untuk prioritas task --}}
                <div class="mb-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select class="form-control" name="priority" id="priority">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                {{-- Tombol untuk menutup modal --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                {{-- Tombol untuk menambahkan task --}}
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>
