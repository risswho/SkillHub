@extends('layouts.auth')

@section('title', 'Login - SkillHub')

@section('content')
<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
    background-color: #f8fafc;
    color: #1e293b;
}

/* --- Split Screen Layout --- */
.auth-split {
    display: flex;
    min-height: 100vh;
    width: 100%;
}

/* --- Left Hero Pane --- */
.auth-left {
    flex: 1;
    background: linear-gradient(135deg, #312e81 0%, #4f46e5 100%);
    color: #ffffff;
    padding: 60px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
}

.auth-left::before {
    content: '';
    position: absolute;
    top: -30%;
    right: -20%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(255,255,255,0.12) 0%, transparent 70%);
    transform: rotate(20deg);
    pointer-events: none;
}

.brand-logo {
    font-size: 1.5rem;
    font-weight: 800;
    letter-spacing: -0.02em;
    color: #ffffff;
    text-decoration: none;
}

.hero-text h2 {
    font-size: 2.75rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 20px;
    letter-spacing: -0.03em;
}

.hero-text p {
    font-size: 1.1rem;
    color: #cbd5e1;
    line-height: 1.6;
    max-width: 440px;
}

.hero-footer {
    font-size: 0.9rem;
    color: #94a3b8;
}

/* --- Right Form Pane --- */
.auth-right {
    flex: 1;
    background-color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
}

.auth-form-container {
    width: 100%;
    max-width: 420px;
    padding: 20px;
}

.form-header {
    margin-bottom: 32px;
}

.form-header h1 {
    font-size: 2rem;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 8px;
    letter-spacing: -0.02em;
}

.form-header p {
    color: #64748b;
    font-size: 0.95rem;
}

/* --- Form Groups --- */
.form-group {
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 0.875rem;
    color: #334155;
}

.form-group input[type="text"],
.form-group input[type="password"] {
    padding: 13px 16px;
    border: 1.5px solid #cbd5e1;
    border-radius: 10px;
    font-size: 1rem;
    color: #0f172a;
    background-color: #f8fafc;
    transition: all 0.2s ease-in-out;
    outline: none;
    width: 100%;
}

.form-group input:focus {
    border-color: #4f46e5;
    background-color: #ffffff;
    box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.12);
}

.form-group input::placeholder {
    color: #94a3b8;
}

/* --- Remember Me & Links --- */
.form-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    font-size: 0.9rem;
}

.remember-me label {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #475569;
    cursor: pointer;
    font-weight: 500;
}

.remember-me input[type="checkbox"] {
    width: 16px;
    height: 16px;
    cursor: pointer;
    accent-color: #4f46e5;
}

/* --- Buttons --- */
.btn-submit {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 10px;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    background-color: #4f46e5;
    color: #ffffff;
    transition: all 0.2s ease-in-out;
    box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
}

.btn-submit:hover {
    background-color: #4338ca;
    transform: translateY(-1px);
}

.btn-submit:active {
    transform: translateY(1px);
}

/* --- Footer Links --- */
.auth-footer-links {
    text-align: center;
    margin-top: 28px;
    font-size: 0.9rem;
    color: #64748b;
}

.auth-footer-links a {
    color: #4f46e5;
    text-decoration: none;
    font-weight: 600;
}

.auth-footer-links a:hover {
    text-decoration: underline;
}

.back-home-wrap {
    margin-top: 16px;
    text-align: center;
}

.back-home-wrap a {
    color: #64748b;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: color 0.2s;
}

.back-home-wrap a:hover {
    color: #0f172a;
}

/* --- Error Messages --- */
.error-box {
    background-color: #fef2f2;
    border: 1px solid #fecaca;
    color: #991b1b;
    padding: 12px 16px;
    border-radius: 10px;
    margin-bottom: 24px;
    font-size: 0.9rem;
}

.error-box ul {
    margin: 0;
    padding-left: 18px;
}

input.is-invalid {
    border-color: #ef4444 !important;
    background-color: #fef2f2 !important;
}

.text-danger {
    color: #dc2626;
    font-size: 0.8rem;
    margin-top: 6px;
    display: block;
}

/* --- Responsive --- */
@media (max-width: 900px) {
    .auth-split {
        flex-direction: column;
    }
    .auth-left {
        display: none; /* Sembunyikan panel kiri di layar HP kecil agar ringkas */
    }
    .auth-right {
        min-height: 100vh;
        background: linear-gradient(135deg, #312e81 0%, #4f46e5 100%);
        padding: 20px;
    }
    .auth-form-container {
        background: #ffffff;
        border-radius: 20px;
        padding: 32px 24px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
}
</style>

<div class="auth-split">
    <!-- Sisi Kiri: Branding & Inspirasi (Gaya Split-Screen Justinmind) -->
    <div class="auth-left">
        <a href="/" class="brand-logo">SkillHub.</a>
        <div class="hero-text">
            <h2>Wujudkan Proyek Impian Bersama Talenta Terbaik.</h2>
            <p>Masuk ke akun Anda untuk mulai mengelola jasa, memantau pesanan, dan berkolaborasi secara profesional.</p>
        </div>
        <div class="hero-footer">
            &copy; {{ date('Y') }} SkillHub Technologies. All rights reserved.
        </div>
    </div>

    <!-- Sisi Kanan: Form Login Modern -->
    <div class="auth-right">
        <div class="auth-form-container">
            <div class="form-header">
                <h1>Selamat Datang</h1>
                <p>Silakan masukkan kredensial akun Anda.</p>
            </div>

            <form method="POST" action="/login">
                @csrf

                @if ($errors->any())
                    <div class="error-box">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="username">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Masukkan username" 
                        value="{{ old('username') }}" 
                        required 
                        autofocus
                        autocomplete="username"
                        class="@error('username') is-invalid @enderror"
                    >
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Masukkan password" 
                        required 
                        autocomplete="current-password"
                        class="@error('password') is-invalid @enderror"
                    >
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="remember-me">
                        <label>
                            <input type="checkbox" name="remember"> Ingat Saya
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    Masuk ke Akun
                </button>
            </form>

            <div class="auth-footer-links">
                Belum punya akun? <a href="/register">Daftar sekarang</a>
            </div>

            <div class="back-home-wrap">
                <a href="/">&larr; Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>
@endsection
