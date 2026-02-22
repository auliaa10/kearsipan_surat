<x-layout.app title="Tambah User">
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="mb-0 text-white">Tambah Pengguna</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('master.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Pengguna</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan nama pengguna.">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan email pengguna.">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password pengguna.">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Pengguna</label>
                        <select name="role" class="form-select">
                            <option value=""> -- Pilih Role -- </option>
                            @foreach ($roles as $role )
                                <option value="{{ $role->name }}">
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-dark" type="submit">
                        <i class="ti ti-check"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
