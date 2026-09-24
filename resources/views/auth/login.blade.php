@extends('layouts.app')

@section('title', 'เข้าสู่ระบบ')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="theme-card p-4 p-md-5">
                <div class="text-center mb-4">
                    <div class="brand-icon-box mx-auto mb-3" style="width: 50px; height: 50px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    </div>
                    <h2 class="h4 fw-bold mb-1" style="color: var(--text-dark-red);">เข้าสู่ระบบผู้ใช้งาน</h2>
                    <p class="text-muted small">ยินดีต้อนรับเข้าสู่ระบบจัดการบทความ</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold" style="color: var(--text-dark-red); font-size: 0.9rem;">อีเมล (Email Address)</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label for="password" class="form-label fw-semibold mb-0" style="color: var(--text-dark-red); font-size: 0.9rem;">รหัสผ่าน (Password)</label>
                            @if (Route::has('password.request'))
                                <a class="small text-decoration-none" href="{{ route('password.request') }}" style="color: var(--red-primary);">
                                    ลืมรหัสผ่าน?
                                </a>
                            @endif
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-muted small" for="remember">
                            จดจำการเข้าสู่ระบบ
                        </label>
                    </div>

                    <button type="submit" class="btn btn-theme-primary w-100 py-2 fw-semibold">
                        เข้าสู่ระบบ
                    </button>
                </form>

                @if (Route::has('register'))
                    <div class="text-center mt-4 pt-3 border-top" style="border-color: var(--red-border) !important;">
                        <span class="text-muted small">ยังไม่มีบัญชีนักเขียน?</span>
                        <a href="{{ route('register') }}" class="small fw-semibold ms-1 text-decoration-none" style="color: var(--red-primary);">
                            สมัครสมาชิกที่นี่
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
