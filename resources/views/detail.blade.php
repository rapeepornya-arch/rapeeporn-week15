@extends('layouts.app')

@section('title', $blogs->title)

@section('content')
    <style>
        .article-container {
            max-width: 860px;
            margin: 0 auto;
        }

        .back-nav {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--red-primary);
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 1.5rem;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            background-color: var(--red-soft-bg);
            transition: all 0.2s ease;
        }

        .back-nav:hover {
            color: var(--red-primary-hover);
            background-color: #9ebdffff;
            transform: translateX(-3px);
        }

        .article-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid var(--red-border);
            padding: 2.5rem 3rem;
            box-shadow: var(--shadow-subtle);
        }

        @media (max-width: 768px) {
            .article-card {
                padding: 1.75rem 1.5rem;
            }
        }

        .article-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--text-dark-red);
            line-height: 1.35;
            margin: 1rem 0;
        }

        .article-meta {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.25rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--red-border);
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .article-meta-item {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .article-body {
            font-size: 1.05rem;
            line-height: 1.85;
            color: #3b3031;
            padding: 2rem 0;
        }

        .article-body p {
            margin-bottom: 1.25rem;
        }

        .article-body img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 1.5rem 0;
            box-shadow: var(--shadow-subtle);
        }

        .article-body blockquote {
            border-left: 4px solid var(--red-primary);
            background-color: var(--red-light);
            padding: 1rem 1.5rem;
            border-radius: 0 12px 12px 0;
            margin: 1.5rem 0;
            font-style: italic;
            color: var(--text-dark-red);
        }

        .article-footer {
            padding-top: 1.5rem;
            border-top: 1px dashed var(--red-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
    </style>

    <div class="article-container">
        <!-- Back Button -->
        <a href="{{ url('/') }}" class="back-nav">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            กลับสู่หน้าหลัก
        </a>

        <!-- Main Article -->
        <article class="article-card">
            <div>
                <span class="badge-soft-red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                    บทความทั่วไป
                </span>
            </div>

            <h1 class="article-title">{{ $blogs->title }}</h1>

            <div class="article-meta">
                <span class="article-meta-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    {{ $blogs->created_at ? $blogs->created_at->format('d F Y') : 'เพิ่งเผยแพร่' }}
                </span>
                <span class="article-meta-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    ผู้เขียน: Natkrita
                </span>
                <span class="article-meta-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    ระยะเวลาอ่าน: 2 นาที
                </span>
            </div>

            <!-- Content Area -->
            <div class="article-body">
                {!! $blogs->content !!}
            </div>

            <!-- Article Footer -->
            <div class="article-footer">
                <a href="{{ url('/') }}" class="btn btn-theme-secondary d-inline-flex align-items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    กลับไปอ่านบทความอื่น
                </a>

                @auth
                    <a href="{{ route('edit', $blogs->id) }}" class="btn btn-theme-primary d-inline-flex align-items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        แก้ไขบทความนี้
                    </a>
                @endauth
            </div>
        </article>
    </div>
@endsection
