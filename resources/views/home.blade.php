@extends('layouts.app')

@section('title', 'SkillHub - Jasa Pembuatan Website & Layanan Profesional')

@section('content')
<style>
    /* =========================================
    DRIBBBLE ULTRA PREMIUM LANDING PAGE - SKILLHUB
    ========================================= */

    :root {
        --primary: #6366f1;
        --primary-dark: #4338ca;
        --secondary: #3b82f6;
        --success: #10b981;
        --accent: #f59e0b;
        --dark: #0f172a;
        --muted: #64748b;
        --light: #f8fafc;
        --border: #e2e8f0;
        --gradient-hero: linear-gradient(135deg, #0f172a 0%, #1e1b4b 40%, #312e81 100%);
    }

    .lp-container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    /* --- 1. Hero Section --- */
    .lp-hero {
        background: var(--gradient-hero);
        border-radius: 32px;
        padding: 100px 50px;
        text-align: center;
        color: #ffffff;
        box-shadow: 0 30px 60px -15px rgba(15, 23, 42, 0.3);
        margin: 40px 0 60px 0;
        position: relative;
        overflow: hidden;
    }

    .lp-hero::before {
        content: '';
        position: absolute;
        top: -30%;
        left: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.3) 0%, transparent 70%);
        pointer-events: none;
    }

    .lp-hero::after {
        content: '';
        position: absolute;
        bottom: -30%;
        right: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.25) 0%, transparent 70%);
        pointer-events: none;
    }

    .lp-hero-content {
        max-width: 820px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .lp-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #c7d2fe;
        padding: 8px 20px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 28px;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .lp-hero h1 {
        font-size: 3.4rem;
        font-weight: 800;
        margin: 0 0 20px 0;
        letter-spacing: -0.03em;
        line-height: 1.15;
        background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .lp-hero p {
        font-size: 1.2rem;
        color: #94a3b8;
        margin: 0 0 40px 0;
        line-height: 1.6;
    }

    .lp-btn-group {
        display: flex;
        gap: 16px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .lp-btn-primary {
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        color: #ffffff;
        padding: 16px 36px;
        border-radius: 14px;
        font-weight: 600;
        font-size: 1.05rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 10px 25px -5px rgba(99, 102, 241, 0.5);
    }

    .lp-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 18px 35px -5px rgba(99, 102, 241, 0.7);
    }

    .lp-btn-outline {
        background: rgba(255, 255, 255, 0.05);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 16px 36px;
        border-radius: 14px;
        font-weight: 600;
        font-size: 1.05rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        backdrop-filter: blur(4px);
        transition: all 0.25s ease;
    }

    .lp-btn-outline:hover {
        background: rgba(255, 255, 255, 0.12);
        border-color: rgba(255, 255, 255, 0.4);
        transform: translateY(-3px);
    }

    /* --- Logged-In User Quick Dashboard Cards --- */
    .user-dashboard-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-top: 35px;
    }

    .user-dash-card {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 18px;
        padding: 24px;
        text-align: left;
        color: #ffffff;
        text-decoration: none;
        backdrop-filter: blur(8px);
        transition: all 0.2s ease;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .user-dash-card:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-3px);
        border-color: #c7d2fe;
    }

    .user-dash-card .card-title {
        font-size: 0.95rem;
        color: #cbd5e1;
        font-weight: 500;
    }

    .user-dash-card .card-value {
        font-size: 1.5rem;
        font-weight: 750;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* --- Stats Bar --- */
    .lp-stats-bar {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 30px;
        margin: -40px auto 70px auto;
        max-width: 1000px;
        position: relative;
        z-index: 10;
        box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.06);
    }

    .lp-stat-item {
        text-align: center;
    }

    .lp-stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 4px;
    }

    .lp-stat-label {
        font-size: 0.9rem;
        color: var(--muted);
        font-weight: 500;
    }

    /* --- Quick Category Pills --- */
    .lp-categories-bar {
        display: flex;
        gap: 12px;
        overflow-x: auto;
        padding-bottom: 12px;
        margin-bottom: 40px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .lp-category-pill {
        background: #ffffff;
        border: 1px solid var(--border);
        color: var(--dark);
        padding: 10px 20px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
    }

    .lp-category-pill:hover, .lp-category-pill.active {
        background: var(--primary);
        color: #ffffff;
        border-color: var(--primary);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(99, 102, 241, 0.3);
    }

    /* --- Section Header --- */
    .lp-section {
        margin: 80px 0;
    }

    .lp-section-header {
        text-align: center;
        max-width: 650px;
        margin: 0 auto 50px auto;
    }

    .lp-section-header h2 {
        font-size: 2.35rem;
        font-weight: 800;
        color: var(--dark);
        margin: 0 0 12px 0;
        letter-spacing: -0.02em;
    }

    .lp-section-header p {
        color: var(--muted);
        font-size: 1.1rem;
        line-height: 1.6;
        margin: 0;
    }

    /* --- Features Grid --- */
    .lp-features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
    }

    .lp-feature-card {
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 24px;
        padding: 40px 32px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
    }

    .lp-feature-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 35px -10px rgba(99, 102, 241, 0.12);
        border-color: #c7d2fe;
    }

    .lp-feature-icon {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
        color: var(--primary);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        margin-bottom: 24px;
        box-shadow: 0 8px 16px rgba(99, 102, 241, 0.15);
    }

    .lp-feature-card h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0 0 12px 0;
    }

    .lp-feature-card p {
        color: var(--muted);
        font-size: 1rem;
        line-height: 1.6;
        margin: 0;
    }

    /* --- Services Grid --- */
    .lp-services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 30px;
    }

    .lp-service-card {
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 24px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
    }

    .lp-service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 35px -10px rgba(15, 23, 42, 0.08);
        border-color: #cbd5e1;
    }

    .lp-service-img-wrap {
        height: 220px;
        background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
        position: relative;
        overflow: hidden;
    }

    .lp-service-thumb {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .lp-service-card:hover .lp-service-thumb {
        transform: scale(1.06);
    }

    .lp-service-fallback {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        color: #2563eb;
        font-size: 2.25rem;
        font-weight: 800;
        letter-spacing: 0.05em;
    }

    .lp-service-body {
        padding: 28px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .lp-service-body h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0 0 10px 0;
        line-height: 1.4;
    }

    .lp-service-desc {
        color: var(--muted);
        font-size: 0.95rem;
        line-height: 1.6;
        margin: 0 0 24px 0;
        flex-grow: 1;
    }

    .lp-service-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 18px;
        border-top: 1px solid var(--border);
        margin-bottom: 20px;
    }

    .lp-service-author {
        font-size: 0.9rem;
        color: var(--muted);
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .lp-service-price {
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--success);
    }

    .lp-btn-detail {
        display: block;
        width: 100%;
        text-align: center;
        background: #f1f5f9;
        color: var(--dark);
        padding: 14px;
        border-radius: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        box-sizing: border-box;
    }

    .lp-btn-detail:hover {
        background: var(--primary);
        color: #ffffff;
        box-shadow: 0 6px 16px rgba(99, 102, 241, 0.35);
    }

    /* --- Testimonials --- */
    .lp-testimonials {
        background: #f8fafc;
        border-radius: 32px;
        padding: 90px 50px;
        margin: 90px 0;
        border: 1px solid var(--border);
    }

    .lp-testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
    }

    .lp-testimonial-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 36px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
        border: 1px solid var(--border);
        transition: transform 0.3s ease;
    }

    .lp-testimonial-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 25px -5px rgba(0, 0, 0, 0.05);
    }

    .lp-stars {
        color: var(--accent);
        font-size: 1.1rem;
        margin-bottom: 18px;
        letter-spacing: 2px;
    }

    .lp-testimonial-card p {
        color: var(--muted);
        font-size: 1rem;
        line-height: 1.6;
        margin: 0 0 24px 0;
        font-style: italic;
    }

    .lp-author-info h4 {
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0 0 4px 0;
    }

    .lp-author-info span {
        font-size: 0.9rem;
        color: var(--muted);
    }

    /* --- Final Call to Action --- */
    .lp-cta-box {
        background: linear-gradient(135deg, #059669 0%, #047857 50%, #065f46 100%);
        border-radius: 32px;
        padding: 80px 50px;
        text-align: center;
        color: #ffffff;
        margin: 90px 0;
        box-shadow: 0 25px 50px -12px rgba(5, 150, 105, 0.35);
        position: relative;
        overflow: hidden;
    }

    .lp-cta-box h2 {
        font-size: 2.75rem;
        font-weight: 800;
        margin: 0 0 16px 0;
        letter-spacing: -0.02em;
    }

    .lp-cta-box p {
        font-size: 1.2rem;
        color: #d1fae5;
        max-width: 650px;
        margin: 0 auto 36px auto;
        line-height: 1.6;
    }

    .lp-btn-light {
        background: #ffffff;
        color: #065f46;
        padding: 16px 40px;
        border-radius: 14px;
        font-weight: 700;
        font-size: 1.1rem;
        text-decoration: none;
        display: inline-block;
        transition: all 0.25s ease;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .lp-btn-light:hover {
        background: #f0fdf4;
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    /* --- Responsive Adjustments --- */
    @media (max-width: 768px) {
        .lp-hero {
            padding: 60px 24px;
            border-radius: 24px;
        }

        .lp-hero h1 {
            font-size: 2.4rem;
        }

        .lp-testimonials, .lp-cta-box {
            padding: 60px 24px;
            border-radius: 24px;
        }

        .lp-cta-box h2 {
            font-size: 2rem;
        }
    }
</style>

<div class="lp-container">

    @if (isset($user) && $user)
        {{-- =========================================
             LOGGED-IN USER HERO & DASHBOARD MINI
             ========================================= --}}
        <section class="lp-hero" style="background: linear-gradient(135deg, #1e1b4b 0%, #312e81 50%, #4f46e5 100%); padding: 70px 40px;">
            <div class="lp-hero-content" style="max-width: 900px;">
                <span class="lp-badge">
                    👋 Selamat datang kembali, {{ $user->username }}! ({{ ucfirst($user->role) }})
                </span>
                <h1 style="font-size: 2.75rem;">Siap Melanjutkan Proyek Hari Ini?</h1>
                <p style="margin-bottom: 24px;">
                    Kelola pesanan, tawarkan jasa baru, atau jelajahi ribuan layanan profesional di SkillHub.
                </p>
                <div class="lp-btn-group">
                    <a href="{{ url('/explore') }}" class="lp-btn-primary">
                        Jelajahi Jasa &rarr;
                    </a>
                    <a href="{{ url('/services/create') }}" class="lp-btn-outline">
                        + Buat Jasa Baru
                    </a>
                </div>

                {{-- Quick Activity Dashboard Cards --}}
                <div class="user-dashboard-cards">
                    <a href="{{ url('/orders') }}" class="user-dash-card">
                        <span class="card-title">📦 Order Aktif Saya</span>
                        <span class="card-value">{{ $activeOrdersCount ?? 0 }} <span>&rarr;</span></span>
                    </a>
                    <a href="{{ url('/orders/incoming') }}" class="user-dash-card">
                        <span class="card-title">📥 Order Masuk</span>
                        <span class="card-value">{{ $incomingOrdersCount ?? 0 }} <span>&rarr;</span></span>
                    </a>
                    <a href="{{ url('/my-services') }}" class="user-dash-card">
                        <span class="card-title">💼 Jasa Saya</span>
                        <span class="card-value">{{ $myServicesCount ?? 0 }} <span>&rarr;</span></span>
                    </a>
                    <a href="{{ url('/profile') }}" class="user-dash-card">
                        <span class="card-title">👤 Profil Akun</span>
                        <span class="card-value">Kelola <span>&rarr;</span></span>
                    </a>
                </div>
            </div>
        </section>
    @else
        {{-- =========================================
             GUEST LANDING PAGE HERO
             ========================================= --}}
        <section class="lp-hero">
            <div class="lp-hero-content">
                <span class="lp-badge">
                    ✨ Platform Marketplace Jasa & Talenta Profesional
                </span>
                <h1>Wujudkan Proyek Impian Bersama Ahli Terbaik</h1>
                <p>
                    Platform terpercaya yang menghubungkan Anda dengan freelancer, desainer, dan developer berdedikasi tinggi untuk mengakselerasi pertumbuhan bisnis dan karya digital Anda.
                </p>
                <div class="lp-btn-group">
                    <a href="{{ url('/explore') }}" class="lp-btn-primary">
                        Jelajahi Jasa Sekarang &rarr;
                    </a>
                    <a href="{{ url('/register') }}" class="lp-btn-outline">
                        Daftar Akun Gratis
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- Stats Bar --}}
    <div class="lp-stats-bar">
        <div class="lp-stat-item">
            <div class="lp-stat-number">{{ $totalServices ?? 0 }}+</div>
            <div class="lp-stat-label">Jasa Profesional</div>
        </div>
        <div class="lp-stat-item">
            <div class="lp-stat-number">100%</div>
            <div class="lp-stat-label">Mitra Terverifikasi</div>
        </div>
        <div class="lp-stat-item">
            <div class="lp-stat-number">24/7</div>
            <div class="lp-stat-label">Dukungan Transaksi</div>
        </div>
        <div class="lp-stat-item">
            <div class="lp-stat-number">4.9★</div>
            <div class="lp-stat-label">Kepuasan Klien</div>
        </div>
    </div>

    {{-- 2. Features Grid --}}
    <section class="lp-section">
        <div class="lp-section-header">
            <h2>Kenapa Memilih SkillHub?</h2>
            <p>Dirancang dengan standar kualitas tinggi untuk menjamin kecepatan, keamanan, dan kepuasan maksimal di setiap proyek.</p>
        </div>

        <div class="lp-features-grid">
            <div class="lp-feature-card">
                <div class="lp-feature-icon">🔍</div>
                <h3>Pilihan Jasa Terkurasi</h3>
                <p>Temukan beragam layanan profesional mulai dari pengembangan website, desain kreatif, hingga optimasi digital.</p>
            </div>
            <div class="lp-feature-card">
                <div class="lp-feature-icon">🛡️</div>
                <h3>Keamanan Transaksi</h3>
                <p>Sistem pemesanan aman dengan alur milestone yang jelas dari awal pengerjaan hingga penyerahan file hasil kerja.</p>
            </div>
            <div class="lp-feature-card">
                <div class="lp-feature-icon">⚡</div>
                <h3>Penyedia Berpengalaman</h3>
                <p>Didukung oleh talenta-talenta profesional yang siap bekerja cepat, responsif, dan profesional.</p>
            </div>
        </div>
    </section>

    {{-- Quick Categories Bar --}}
    @if(isset($categories) && $categories->count() > 0)
    <div class="lp-categories-bar">
        <a href="{{ url('/explore') }}" class="lp-category-pill active">Semua Kategori</a>
        @foreach($categories as $cat)
            <a href="{{ url('/explore?category=' . $cat->id) }}" class="lp-category-pill">{{ $cat->name }}</a>
        @endforeach
    </div>
    @endif

    {{-- 3. Popular Services Grid --}}
    <section class="lp-section">
        <div class="lp-section-header" style="display: flex; justify-content: space-between; align-items: flex-end; max-width: 100%; margin-bottom: 40px; flex-wrap: wrap; gap: 20px;">
            <div style="text-align: left;">
                <h2>Jasa Populer & Terbaru</h2>
                <p style="margin: 0;">Pilih layanan unggulan yang siap membantu menyelesaikan proyek Anda hari ini.</p>
            </div>
            <a href="{{ url('/explore') }}" style="font-weight: 600; color: var(--primary); text-decoration: none; display: flex; align-items: center; gap: 4px;">
                Lihat Semua Jasa &rarr;
            </a>
        </div>

        <div class="lp-services-grid">
            @forelse ($services as $service)
                <div class="lp-service-card">
                    <div class="lp-service-img-wrap">
                        @if ($service->thumbnail)
                            <img
                                src="{{ asset('storage/' . $service->thumbnail) }}"
                                alt="{{ $service->title }}"
                                class="lp-service-thumb"
                            >
                        @else
                            <div class="lp-service-fallback">
                                <span>{{ strtoupper(substr($service->title, 0, 2)) }}</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="lp-service-body">
                        <h3>{{ $service->title }}</h3>
                        <p class="lp-service-desc">
                            {{ Str::limit($service->description, 95) }}
                        </p>
                        
                        <div class="lp-service-footer">
                            <span class="lp-service-author">
                                👤 {{ $service->user->username ?? 'Provider' }}
                            </span>
                            <span class="lp-service-price">
                                Rp {{ number_format($service->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <a href="{{ url('/services/' . $service->id) }}" class="lp-btn-detail">
                            Lihat Detail & Pesan
                        </a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 70px; background: #ffffff; border-radius: 24px; border: 1px solid var(--border);">
                    <p style="color: var(--muted); font-size: 1.1rem; margin: 0 0 20px 0;">Belum ada jasa aktif yang tersedia saat ini.</p>
                    <a href="{{ url('/register') }}" class="lp-btn-primary" style="padding: 12px 28px; font-size: 1rem;">Mulai Tawarkan Jasa Anda</a>
                </div>
            @endforelse
        </div>
    </section>

    {{-- 4. Testimonials --}}
    <section class="lp-testimonials">
        <div class="lp-section-header">
            <h2>Dipercaya oleh Ratusan Klien & Bisnis</h2>
            <p>Apa kata mereka yang telah sukses menyelesaikan proyeknya melalui SkillHub.</p>
        </div>

        <div class="lp-testimonials-grid">
            <div class="lp-testimonial-card">
                <div class="lp-stars">★★★★★</div>
                <p>"Proses pemesanan sangat intuitif dan transparan. Provider sangat profesional dan hasil pekerjaan dikirimkan tepat waktu."</p>
                <div class="lp-author-info">
                    <h4>Rian Pratama</h4>
                    <span>Founder Startup Digital</span>
                </div>
            </div>
            <div class="lp-testimonial-card">
                <div class="lp-stars">★★★★★</div>
                <p>"Fitur upload hasil kerja dan manajemen order memudahkan saya memantau progres tanpa ada miskomunikasi."</p>
                <div class="lp-author-info">
                    <h4>Siti Aminah</h4>
                    <span>Freelance Web Developer</span>
                </div>
            </div>
            <div class="lp-testimonial-card">
                <div class="lp-stars">★★★★★</div>
                <p>"Platform terbaik untuk mencari talenta profesional dengan harga bersaing dan kualitas kerja yang sangat memuaskan."</p>
                <div class="lp-author-info">
                    <h4>Ahmad Fauzi</h4>
                    <span>Digital Marketer</span>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. Final CTA Box --}}
    @if (!isset($user) || !$user)
    <section class="lp-cta-box">
        <h2>Siap Memulai Proyek Anda Berikutnya?</h2>
        <p>Bergabunglah bersama komunitas profesional kami dan wujudkan berbagai inovasi digital dengan mudah dan aman.</p>
        <a href="{{ url('/register') }}" class="lp-btn-light">
            Buat Akun Gratis Sekarang
        </a>
    </section>
    @endif

</div>
@endsection
