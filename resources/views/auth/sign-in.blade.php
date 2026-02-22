<x-auth.sign-in title="Sign In">

    <div class="text-center mb-4">
        <h1 class="auth-title fw-bold">Sign In</h1>
        <div class="auth-sub">Masuk ke sistem arsip surat</div>
    </div>

    @if(session('status'))
        <div class="alert alert-info">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   class="form-control form-control-lg @error('email') is-invalid @enderror"
                   placeholder="Masukkan email"
                   required autofocus>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Password</label>
            <input type="password"
                   name="password"
                   class="form-control form-control-lg @error('password') is-invalid @enderror"
                   placeholder="Masukkan password"
                   required>
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100">
            Login
        </button>

        <div class="text-center mt-4 text-muted" style="font-size:13px;">
            Gunakan akun yang diberikan admin.
        </div>
    </form>

</x-auth.sign-in>
