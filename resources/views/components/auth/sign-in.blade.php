<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sign In - Arsip DPMPTSP' }}</title>

    <link rel="stylesheet" href="{{ asset('template/src/assets/css/styles.min.css') }}">

    {{-- custom kecil biar layout rapih --}}
    <style>
        .auth-wrap {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 12px;
            background: #f6f7fb;
        }

        .auth-card {
            width: min(1100px, 100%);
            border-radius: 18px;
            overflow: hidden;
        }

        .auth-left {
            background: linear-gradient(135deg, #2b2a4c, #3b3385);
            color: #fff;
            min-height: 520px;
        }

        .auth-left-inner {
            padding: 36px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .auth-right {
            background: #fff;
            min-height: 520px;
            padding: 56px 56px;
        }

        .auth-form {
            max-width: 440px;
            margin: 0 auto;
        }

        /* Logo container: bener-bener center */
        .logo-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 14px 0 6px;
        }

        .logo-badge {
            background: rgba(255, 255, 255, .95);
            border-radius: 18px;
            width: 320px;
            height: 320px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            /* ini yang bikin dead-center */
            box-shadow: 0 10px 30px rgba(0, 0, 0, .18);
        }

        .auth-logo {
            max-width: 240px;
            max-height: 240px;
            width: 100%;
            height: auto;
            object-fit: contain;
            display: block;
        }

        @media (max-width:991.98px) {
            .auth-left {
                display: none;
            }

            .auth-right {
                padding: 40px 22px;
                min-height: auto;
            }
        }
    </style>

    {{ $head ?? '' }}
</head>

<body>

    <div class="auth-wrap">
        <div class="card shadow-lg border-0 auth-card">
            <div class="row g-0">

                {{-- LEFT --}}
                <div class="col-lg-5 auth-left">
                    <div class="auth-left-inner">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="fw-bold">ARSIP DPMPTSP</div>
                                <a href="{{ url('/') }}" class="btn btn-sm btn-light rounded-pill">
                                    Back →
                                </a>
                            </div>

                            {{-- Logo instansi (bukan full-bleed image) --}}
                            <div class="logo-wrap">
                                <div class="logo-badge">
                                    <img class="auth-logo"
                                        src="{{ asset('template/src/assets/images/logos/favicon.svg') }}"
                                        alt="Logo Instansi">
                                </div>
                            </div>

                            <div class="mt-4">
                                <div class="fw-semibold" style="opacity:.9">Sistem Kearsipan Surat</div>
                                <div style="opacity:.75; font-size:14px;">
                                    Surat masuk, surat keluar, disposisi, dan arsip.
                                </div>
                            </div>
                        </div>

                        <div style="opacity:.75; font-size:13px;">
                            © {{ date('Y') }} Arsip DPMPTSP
                        </div>
                    </div>
                </div>

                {{-- RIGHT --}}
                <div class="col-lg-7 auth-right">
                    <div class="auth-form">
                        {{ $slot }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('template/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/app.min.js') }}"></script>

    {{ $scripts ?? '' }}
</body>

</html>
