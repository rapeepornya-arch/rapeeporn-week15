@extends('layouts.app')

@section('title', 'หน้าแรก - บทความล่าสุด')

@section('content')
    <style>
        .hero-banner {
            background: linear-gradient(135deg, #9ebdffff 0%, #e7eaff 100%);
            border: 1px solid var(--red-border);
            border-radius: 20px;
            padding: 3rem 2rem;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-subtle);
        }

        .hero-banner::after {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 220px;
            height: 220px;
            background: radial-gradient(circle, rgba(220, 222, 255, 0.12) 0%, transparent 70%);
            border-radius: 50%;
        }

        .hero-title {
            font-size: 2.3rem;
            font-weight: 700;
            color: var(--text-dark-red);
            line-height: 1.3;
        }

        .hero-subtitle {
            color: var(--text-muted);
            font-size: 1.05rem;
            max-width: 600px;
        }

        .blog-card {
            background: #ffffff;
            border: 1px solid var(--red-border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow-subtle);
        }

        .blog-card:hover {
            transform: translateY(-6px);
            border-color: #9ebdffff;
            box-shadow: var(--shadow-hover);
        }

        .blog-card-body {
            padding: 1.75rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .blog-card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-dark-red);
            margin: 0.75rem 0;
            line-height: 1.4;
            transition: color 0.2s ease;
        }

        .blog-card:hover .blog-card-title {
            color: var(--red-primary);
        }

        .blog-card-content {
            color: #423badff;
            font-size: 0.92rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .blog-card-footer {
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px dashed var(--red-border);
        }

        .btn-read-more {
            color: var(--red-primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            transition: all 0.2s ease;
        }

        .btn-read-more:hover {
            color: var(--red-primary-hover);
            transform: translateX(3px);
        }

        .badge-date {
            background-color: var(--red-soft-bg);
            color: var(--text-dark-red);
            font-size: 0.78rem;
            font-weight: 500;
            padding: 0.35rem 0.75rem;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }
    </style>

    <!-- Hero Section -->
    <div class="hero-banner text-center text-md-start">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge-soft-red mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    เรื่องราวและสาระน่ารู้
                </span>
                <h1 class="hero-title">ยินดีต้อนรับสู่บล็อกของเรา</h1>
                <p class="hero-subtitle mb-0 mt-2">
                    แหล่งรวมบทความหลากหลายเรื่องราว ไอเดียสร้างสรรค์ และสาระความรู้ที่คัดสรรมาเพื่อคุณ
                </p>
            </div>
            <div class="col-lg-4 text-center text-lg-end mt-4 mt-lg-0">
                <a href="{{ route('about2') }}" class="btn btn-outline-theme me-2">เกี่ยวกับเรา</a>
                @auth
                    <a href="{{ route('create') }}" class="btn btn-theme-primary">+ เขียนบทความ</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Latest Articles Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h2 class="h4 mb-1" style="color: var(--text-dark-red); font-weight: 600;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1 text-danger"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                บทความล่าสุด
            </h2>
            <p class="text-muted small mb-0">พบกับบทความอัปเดตใหม่ที่เปิดให้อ่านฟรี</p>
        </div>
        <span class="badge-soft-red">
            ทั้งหมด {{ count($blogs) }} บทความ
        </span>
    </div>

    <!-- Articles Grid -->
    @if (count($blogs) > 0)
        <div class="row g-4">
            @foreach ($blogs as $item)
                <div class="col-md-6 col-lg-4">
                    <article class="blog-card">
                        <div class="blog-card-body">
                            <div>
                                <span class="badge-date">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    {{ $item->created_at ? $item->created_at->format('d M Y') : 'ล่าสุด' }}
                                </span>
                            </div>

                            <h3 class="blog-card-title">
                                <a href="/detail/{{ $item->id }}" style="text-decoration: none; color: inherit;">
                                    {{ Str::limit($item->title, 55) }}
                                </a>
                            </h3>

                            <div class="blog-card-content">
                                {{ Str::limit(strip_tags($item->content), 110) }}
                            </div>

                            <div class="blog-card-footer">
                                <span class="text-muted small">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    อ่าน 2 นาที
                                </span>
                                <a href="/detail/{{ $item->id }}" class="btn-read-more">
                                    อ่านเพิ่มเติม
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    @else
        <div class="theme-card text-center p-5">
            <div style="font-size: 3rem; color: var(--red-primary); margin-bottom: 1rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
            </div>
            <h3 style="color: var(--text-dark-red); font-weight: 600;">ยังไม่มีบทความในขณะนี้</h3>
            <p class="text-muted">โปรดกลับมาติดตามบทความใหม่ๆ ได้ในเร็วๆ นี้</p>
            @auth
                <a href="{{ route('create') }}" class="btn btn-theme-primary mt-2">+ เริ่มเขียนบทความแรก</a>
            @endauth
        </div>
    @endif
@endsection
