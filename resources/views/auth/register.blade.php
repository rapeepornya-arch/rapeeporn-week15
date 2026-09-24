@extends('layouts.app')

@section('title', 'สมัครเป็นนักเขียน')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="theme-card p-4 p-md-5">
                <div class="text-center mb-4">
                    <div class="brand-icon-box mx-auto mb-3" style="width: 50px; height: 50px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                    </div>
                    <h2 class="h4 fw-bold mb-1" style="color: var(--text-dark-red);">สมัครสมาชิกนักเขียน</h2>
                    <p class="text-muted small">เริ่มต้นแบ่งปันเรื่องราวและบทความของคุณ</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold" style="color: var(--text-dark-red); font-size: 0.9rem;">ชื่อ-นามสกุล / นามปากกา</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="ชื่อของคุณ">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold" style="color: var(--text-dark-red); font-size: 0.9rem;">อีเมล (Email Address)</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold" style="color: var(--text-dark-red); font-size: 0.9rem;">รหัสผ่าน (Password)</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="อย่างน้อย 8 ตัวอักษร">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="form-label fw-semibold" style="color: var(--text-dark-red); font-size: 0.9rem;">ยืนยันรหัสผ่าน (Confirm Password)</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="กรอกรหัสผ่านซ้ำอีกครั้ง">
                    </div>

                    <button type="submit" class="btn btn-theme-primary w-100 py-2 fw-semibold">
                        ลงทะเบียนนักเขียน
                    </button>
                </form>

                <div class="text-center mt-4 pt-3 border-top" style="border-color: var(--red-border) !important;">
                    <span class="text-muted small">มีบัญชีผู้ใช้อยู่แล้ว?</span>
                    <a href="{{ route('login') }}" class="small fw-semibold ms-1 text-decoration-none" style="color: var(--red-primary);">
                        เข้าสู่ระบบ
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
