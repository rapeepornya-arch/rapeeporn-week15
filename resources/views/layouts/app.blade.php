<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'ระบบจัดการบล็อก') | Natkrita</title>

    <!-- Google Fonts: Mitr (Thai) & Plus Jakarta Sans (Latin) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300;400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Global Soft-Red Theme Styles -->
    <style>
        :root {
            --red-primary: #e04b4b;
            --red-primary-hover: #c93b3b;
            --red-primary-active: #b53030;
            --red-light: #fff5f5;
            --red-soft-bg: #ffeef0;
            --red-border: #ffd8db;
            --text-main: #3d3334;
            --text-dark-red: #7c1a1a;
            --text-muted: #8c7676;
            --shadow-subtle: 0 8px 25px rgba(224, 75, 75, 0.06);
            --shadow-hover: 0 14px 35px rgba(224, 75, 75, 0.12);
            --card-radius: 18px;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Mitr', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #fdf8f8;
            background-image: 
                radial-gradient(at 0% 0%, rgba(255, 235, 238, 0.6) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(255, 240, 242, 0.7) 0px, transparent 50%);
            background-attachment: fixed;
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content {
            flex: 1 0 auto;
        }

        /* Navbar Styling */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.92) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--red-border);
            box-shadow: 0 4px 20px rgba(224, 75, 75, 0.04);
            padding: 0.85rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand-custom {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--text-dark-red) !important;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .navbar-brand-custom:hover {
            color: var(--red-primary) !important;
            transform: scale(1.02);
        }

        .brand-icon-box {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--red-primary) 0%, #ff7b7b 100%);
            color: #ffffff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(224, 75, 75, 0.25);
        }

        .navbar-custom .nav-link {
            color: #5c4446 !important;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 1rem !important;
            border-radius: 20px;
            transition: all 0.2s ease;
        }

        .navbar-custom .nav-link:hover {
            color: var(--red-primary) !important;
            background-color: var(--red-soft-bg);
        }

        .dropdown-menu-custom {
            border: 1px solid var(--red-border);
            border-radius: 14px;
            box-shadow: var(--shadow-hover);
            padding: 0.5rem;
            background: #ffffff;
        }

        .dropdown-menu-custom .dropdown-item {
            border-radius: 8px;
            font-weight: 500;
            padding: 0.6rem 1rem;
            color: var(--text-main);
            transition: all 0.2s ease;
        }

        .dropdown-menu-custom .dropdown-item:hover {
            background-color: var(--red-soft-bg);
            color: var(--red-primary);
        }

        /* Buttons */
        .btn-primary, .btn-theme-primary {
            background: linear-gradient(135deg, var(--red-primary) 0%, #d84545 100%) !important;
            border: none !important;
            color: #ffffff !important;
            font-weight: 500;
            border-radius: 25px;
            padding: 0.55rem 1.5rem;
            box-shadow: 0 4px 14px rgba(224, 75, 75, 0.25);
            transition: all 0.25s ease;
        }

        .btn-primary:hover, .btn-theme-primary:hover {
            background: linear-gradient(135deg, #cc3f3f 0%, #bd3333 100%) !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(224, 75, 75, 0.35);
            color: #ffffff !important;
        }

        .btn-outline-theme {
            background: transparent;
            border: 1.5px solid var(--red-primary) !important;
            color: var(--red-primary) !important;
            font-weight: 500;
            border-radius: 25px;
            padding: 0.5rem 1.4rem;
            transition: all 0.25s ease;
        }

        .btn-outline-theme:hover {
            background-color: var(--red-primary) !important;
            color: #ffffff !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(224, 75, 75, 0.25);
        }

        .btn-theme-secondary {
            background-color: #f7eded !important;
            border: 1px solid var(--red-border) !important;
            color: #6d4b4d !important;
            font-weight: 500;
            border-radius: 25px;
            padding: 0.55rem 1.4rem;
            transition: all 0.2s ease;
        }

        .btn-theme-secondary:hover {
            background-color: #f0dedf !important;
            color: var(--text-dark-red) !important;
        }

        /* Card Styles */
        .theme-card {
            background: #ffffff;
            border-radius: var(--card-radius);
            border: 1px solid var(--red-border);
            box-shadow: var(--shadow-subtle);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .theme-card:hover {
            box-shadow: var(--shadow-hover);
        }

        /* Form Controls */
        .form-control, .form-select {
            border: 1.5px solid #ecd8da;
            border-radius: 12px;
            padding: 0.7rem 1rem;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            color: var(--text-main);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--red-primary);
            box-shadow: 0 0 0 4px rgba(224, 75, 75, 0.15);
        }

        /* Badge / Pills */
        .badge-soft-red {
            background-color: var(--red-soft-bg);
            color: var(--text-dark-red);
            border: 1px solid var(--red-border);
            font-weight: 500;
            padding: 0.4rem 0.85rem;
            border-radius: 20px;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        /* Page Headers */
        .section-header {
            background: linear-gradient(135deg, #fff5f5 0%, #ffeef0 100%);
            border-left: 5px solid var(--red-primary);
            border-radius: 14px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-subtle);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .section-header h1, .section-header h2 {
            font-weight: 600;
            color: var(--text-dark-red);
            margin: 0;
            font-size: 1.7rem;
        }

        .section-header p {
            margin: 0.25rem 0 0 0;
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        /* Alerts */
        .alert-danger {
            background-color: #fff2f3;
            border: 1px solid #ffccd0;
            color: #a3222d;
            border-radius: 12px;
        }

        .alert-success {
            background-color: #f1faf5;
            border: 1px solid #c8edd8;
            color: #1b683e;
            border-radius: 12px;
        }

        /* Pagination */
        .pagination {
            gap: 0.35rem;
            justify-content: center;
        }

        .pagination .page-item .page-link {
            border: 1px solid var(--red-border);
            border-radius: 10px;
            color: var(--text-dark-red);
            font-weight: 500;
            padding: 0.45rem 0.9rem;
            transition: all 0.2s ease;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--red-primary);
            border-color: var(--red-primary);
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(224, 75, 75, 0.25);
        }

        .pagination .page-item .page-link:hover {
            background-color: var(--red-soft-bg);
            border-color: var(--red-primary);
            color: var(--red-primary);
        }

        /* Summernote Overrides */
        .note-editor.note-frame {
            border: 1.5px solid #ecd8da !important;
            border-radius: 12px !important;
            overflow: hidden;
        }

        .note-editor.note-frame .note-toolbar {
            background-color: var(--red-light) !important;
            border-bottom: 1px solid var(--red-border) !important;
        }

        /* Footer */
        .site-footer {
            background: #ffffff;
            border-top: 1px solid var(--red-border);
            padding: 1.5rem 0;
            text-align: center;
            font-size: 0.88rem;
            color: var(--text-muted);
            margin-top: 3rem;
        }
        
        .site-footer a {
            color: var(--red-primary);
            text-decoration: none;
        }

        .site-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Top Navigation -->
        <nav class="navbar navbar-expand-md navbar-custom sticky-top">
            <div class="container">
                <a class="navbar-brand-custom" href="{{ url('/') }}">
                    <div class="brand-icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                    </div>
                    <span>Blog Application</span>
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto ms-lg-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                หน้าแรก
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about2') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                                เกี่ยวกับเรา
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto align-items-center gap-1">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item ms-lg-2">
                                    <a class="btn btn-theme-primary py-1.5 px-3" href="{{ route('register') }}">สมัครเป็นนักเขียน</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item me-2">
                                <a href="{{ route('create') }}" class="btn btn-theme-primary py-1.5 px-3 d-inline-flex align-items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    เขียนบทความใหม่
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-inline-flex align-items-center gap-2" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="badge-soft-red py-1 px-2.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        {{ Auth::user()->name }}
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-custom" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="/author/blog2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                                        จัดการบทความทั้งหมด
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="/author/create">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        เขียนบทความใหม่
                                    </a>
                                    <hr class="dropdown-divider my-1" style="border-color: var(--red-border);">
                                    <a class="dropdown-item d-flex align-items-center gap-2 text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        ออกจากระบบ
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content Body -->
        <main class="main-content container py-4 py-lg-5">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="site-footer">
            <div class="container">
                <p class="mb-1">© {{ date('Y') }} <strong>Blog Application</strong> • พัฒนาโดย <span style="color: var(--red-primary); font-weight: 600;">Natkrita</span></p>
                <p class="mb-0 text-muted" style="font-size: 0.8rem;">สร้างสรรค์ด้วยความใส่ใจ ในโทนสีละมุนตา</p>
            </div>
        </footer>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Summernote Lite CSS & JS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            if ($('#content').length) {
                $('#content').summernote({
                    placeholder: 'เขียนเนื้อหาบทความที่นี่...',
                    tabsize: 2,
                    height: 280,
                    callbacks: {
                        onPaste: function(e) {
                            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData)
                                .getData('Text');
                            e.preventDefault();
                            document.execCommand('insertText', false, bufferText);
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>
