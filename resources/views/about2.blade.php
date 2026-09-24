@extends('layouts.app')

@section('title', 'เกี่ยวกับเรา')

@section('content')
    <style>
        .about-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid var(--red-border);
            padding: 3rem;
            max-width: 780px;
            margin: 0 auto;
            box-shadow: var(--shadow-subtle);
        }

        @media (max-width: 768px) {
            .about-card {
                padding: 2rem 1.5rem;
            }
        }

        .avatar-circle {
            width: 84px;
            height: 84px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--red-primary) 0%, #ff8585 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 2rem;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(224, 75, 75, 0.25);
            margin: 0 auto 1.5rem auto;
        }

        .about-title {
            color: var(--text-dark-red);
            font-weight: 700;
            font-size: 1.85rem;
            margin-bottom: 0.5rem;
        }

        .info-pill {
            background-color: var(--red-light);
            border: 1px solid var(--red-border);
            border-radius: 14px;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            transition: all 0.2s ease;
        }

        .info-pill:hover {
            background-color: var(--red-soft-bg);
            transform: translateY(-2px);
        }

        .info-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background-color: #ffffff;
            border: 1px solid var(--red-border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--red-primary);
            flex-shrink: 0;
        }
    </style>

    <div class="about-card text-center text-md-start">
        <div class="text-center mb-4">
            <div class="avatar-circle">
                {{ mb_substr($name, 0, 1, 'UTF-8') }}
            </div>
            <span class="badge-soft-red mb-2">
                ผู้พัฒนาระบบ Blog Application
            </span>
            <h1 class="about-title">{{ $name }}</h1>
            <p class="text-muted" style="max-width: 500px; margin: 0 auto;">
                มุ่งมั่นสร้างสรรค์ประสบการณ์การอ่านและเขียนบทความที่เรียบง่าย ทันสมัย และสวยงาม
            </p>
        </div>

        <div class="row g-3 my-4">
            <div class="col-md-6">
                <div class="info-pill">
                    <div class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </div>
                    <div>
                        <div class="text-muted small">ผู้พัฒนาระบบ</div>
                        <div class="fw-semibold" style="color: var(--text-dark-red);">{{ $name }}</div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-pill">
                    <div class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </div>
                    <div>
                        <div class="text-muted small">วันที่ก่อตั้ง / พัฒนา</div>
                        <div class="fw-semibold" style="color: var(--text-dark-red);">{{ $date }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-3 mb-4 rounded-3" style="background-color: #ffffff; border: 1px dashed var(--red-border); line-height: 1.8; color: #5a4748;">
            <p class="mb-0">
                ระบบ Blog Application นี้ได้รับการออกแบบและพัฒนาด้วย Laravel Framework ร่วมกับระบบจัดการบทความ Summernote 
                ที่ช่วยให้สามารถเขียน ตกแต่งข้อความ และจัดการสถานะการเผยแพร่ได้อย่างสะดวก รวดเร็ว พร้อมโทนสีละมุนตาที่เป็นมิตรต่อผู้อ่าน
            </p>
        </div>

        <div class="text-center pt-2">
            <a href="{{ url('/') }}" class="btn btn-theme-primary px-4 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                กลับสู่หน้าแรก
            </a>
        </div>
    </div>
@endsection
