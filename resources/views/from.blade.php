@extends('layouts.app')

@section('title', 'เขียนบทความใหม่')

@section('content')
    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .form-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid var(--red-border);
            padding: 2.5rem;
            box-shadow: var(--shadow-subtle);
        }

        @media (max-width: 768px) {
            .form-card {
                padding: 1.75rem 1.25rem;
            }
        }

        .form-header-title {
            color: var(--text-dark-red);
            font-weight: 700;
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .form-header-subtitle {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--red-border);
        }

        .custom-label {
            font-weight: 600;
            color: var(--text-dark-red);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
    </style>

    <div class="form-container">
        <!-- Back Navigation -->
        <div class="mb-3">
            <a href="/author/blog2" class="btn btn-theme-secondary py-1 px-3 d-inline-flex align-items-center gap-1" style="font-size: 0.88rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                กลับไปจัดการบทความ
            </a>
        </div>

        <div class="form-card">
            <div class="form-header-title">
                <div class="brand-icon-box" style="width: 38px; height: 38px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                </div>
                เขียนบทความใหม่
            </div>
            <p class="form-header-subtitle">สร้างสรรค์และแบ่งปันเรื่องราวใหม่ๆ ให้ผู้อ่านได้รับชม</p>
            
            @if (isset($errors) && $errors->any())
                <div class="alert alert-danger mb-4 p-3">
                    <div class="d-flex align-items-center gap-2 mb-2 fw-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        โปรดตรวจสอบข้อผิดพลาดด้านล่าง:
                    </div>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/author/insert">
                @csrf
                <div class="mb-4">
                    <label for="title" class="custom-label">ชื่อบทความ <span class="text-danger">*</span></label>
                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="กรอกชื่อบทความของคุณ (ไม่เกิน 50 ตัวอักษร)">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="content" class="custom-label">เนื้อหาบทความ <span class="text-danger">*</span></label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="6">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex align-items-center gap-2 mt-4 pt-2 border-top" style="border-color: var(--red-border) !important;">
                    <button type="submit" class="btn btn-theme-primary d-inline-flex align-items-center gap-2 px-4 py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                        บันทึกบทความ
                    </button>
                    <a href="/author/blog2" class="btn btn-theme-secondary px-4 py-2">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>
@endsection