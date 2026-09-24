@extends('layouts.app')

@section('title', 'แผงควบคุมนักเขียน (Dashboard)')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8">
            <div class="theme-card p-4 p-md-5">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="brand-icon-box" style="width: 52px; height: 52px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </div>
                    <div>
                        <span class="badge-soft-red mb-1">ยินดีต้อนรับกลับมา</span>
                        <h2 class="h3 mb-0" style="color: var(--text-dark-red); font-weight: 700;">
                            สวัสดีคุณ {{ Auth::user()->name }}
                        </h2>
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-success mb-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <p class="text-muted mb-4">
                    คุณได้เข้าสู่ระบบเรียบร้อยแล้ว สามารถเลือกดำเนินการจัดการเนื้อหาบทความของคุณได้จากเมนูด้านล่างนี้
                </p>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <a href="/author/create" class="p-3 text-decoration-none rounded-3 d-flex align-items-center gap-3" style="background-color: var(--red-light); border: 1.5px solid var(--red-border); transition: all 0.2s ease;">
                            <div class="brand-icon-box" style="width: 40px; height: 40px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </div>
                            <div>
                                <div class="fw-bold" style="color: var(--text-dark-red);">เขียนบทความใหม่</div>
                                <div class="small text-muted">สร้างสรรค์เนื้อหาใหม่</div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6">
                        <a href="/author/blog2" class="p-3 text-decoration-none rounded-3 d-flex align-items-center gap-3" style="background-color: var(--red-light); border: 1.5px solid var(--red-border); transition: all 0.2s ease;">
                            <div class="brand-icon-box" style="width: 40px; height: 40px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                            </div>
                            <div>
                                <div class="fw-bold" style="color: var(--text-dark-red);">จัดการบทความทั้งหมด</div>
                                <div class="small text-muted">แก้ไข ลบ และเปลี่ยนสถานะ</div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="pt-4 mt-4 border-top text-center text-sm-start" style="border-color: var(--red-border) !important;">
                    <a href="{{ url('/') }}" class="btn btn-outline-theme">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        ดูหน้าแรกเว็บไซต์
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
