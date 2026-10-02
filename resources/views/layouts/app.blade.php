<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SkillHub - Marketplace Jasa Profesional')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* =========================================
           SKILLHUB GLOBAL LAYOUT & NAVBAR / FOOTER
           ========================================= */

        :root {
            --primary: #6366f1;
            --primary-dark: #4338ca;
            --secondary: #3b82f6;
            --success: #10b981;
            --dark: #0f172a;
            --muted: #64748b;
            --light: #f8fafc;
            --border: #e2e8f0;
        }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* --- Sticky Glassmorphism Navbar --- */
        nav {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 0 40px;
            display: flex;
            align-items: center;
            gap: 6px;
            height: 76px;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px -5px rgba(0, 0, 0, 0.03);
            overflow-x: auto;
        }

        nav::-webkit-scrollbar {
            display: none;
        }

        /* Brand / Logo SkillHub */
        nav a.nav-brand {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--primary) !important;
            margin-right: 24px;
            padding-left: 0;
            background: transparent !important;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            white-space: nowrap;
        }

        nav a.nav-brand:hover {
            color: var(--primary-dark) !important;
        }

        /* Navigation Links */
        nav a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            padding: 8px 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        nav a:hover {
            color: var(--primary);
            background-color: #f1f5f9;
        }

        /* Special Auth Buttons in Navbar */
        nav a.nav-btn-login {
            color: var(--primary);
            border: 1px solid #c7d2fe;
            font-weight: 600;
        }

        nav a.nav-btn-login:hover {
            background-color: #e0e7ff;
        }

        nav a.nav-btn-register {
            background-color: var(--primary);
            color: #ffffff;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        nav a.nav-btn-register:hover {
            background-color: var(--primary-dark);
            color: #ffffff;
        }

        /* Right side form (Logout) */
        nav .nav-right-form {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        nav button[type="submit"] {
            background-color: #fef2f2;
            color: #ef4444;
            border: 1px solid #fecaca;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        nav button[type="submit"]:hover {
            background-color: #fee2e2;
            border-color: #ef4444;
        }

        /* --- Main Content Area --- */
        main {
            flex-grow: 1;
        }

        /* --- Professional Footer --- */
        footer {
            background-color: #0f172a;
            color: #94a3b8;
            padding: 60px 40px 30px 40px;
            margin-top: 80px;
            border-top: 1px solid #1e293b;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-col h3 {
            color: #ffffff;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .footer-col p {
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0 0 20px 0;
        }

        .footer-col ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-col ul li {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.2s ease;
        }

        .footer-col ul li a:hover {
            color: #ffffff;
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 24px;
            border-top: 1px solid #1e293b;
            text-align: center;
            font-size: 0.875rem;
            color: #64748b;
        }

        @media (max-width: 768px) {
            nav {
                padding: 0 20px;
            }
            footer {
                padding: 40px 20px 20px 20px;
            }
        }
    </style>
</head>

<body>

<nav>
    <!-- Brand / Logo -->
    <a href="/" class="nav-brand">
        ⚡ SkillHub
    </a>

    <!-- Menu Utama -->
    <a href="/">Home</a>

    @if (session()->has('user_id'))
        <!-- Menu untuk User / Admin yang sudah login -->
        <a href="/explore">Explore Jasa</a>
        <a href="/my-services">Jasa Saya</a>
        <a href="/orders">Order Saya</a>
        <a href="/orders/incoming">Order Masuk</a>
        <a href="/orders/history">Riwayat Order</a>
        <a href="/profile">Profile</a>

        @if (session('role') === 'admin')
            <a href="/categories">Kelola Kategori</a>
        @endif

        <!-- Tombol Logout -->
        <div class="nav-right-form">
            <form method="POST" action="/logout" style="display: inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    @else
        <!-- Menu untuk Tamu / Guest (Belum login) -->
        <div class="nav-right-form">
            <a href="/login" class="nav-btn-login">Login</a>
            <a href="/register" class="nav-btn-register">Daftar</a>
        </div>
    @endif
</nav>

<main>
    @yield('content')
</main>

<footer>
    <div class="footer-container">
        <div class="footer-col">
            <h3>⚡ SkillHub</h3>
            <p>Platform marketplace terpercaya di Indonesia yang menghubungkan klien dengan talenta digital dan penyedia jasa profesional berkualitas tinggi.</p>
        </div>
        <div class="footer-col">
            <h3>Navigasi Cepat</h3>
            <ul>
                <li><a href="/">Beranda</a></li>
                <li><a href="/explore">Jelajahi Jasa</a></li>
                <li><a href="/login">Masuk Akun</a></li>
                <li><a href="/register">Daftar Gratis</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h3>Kategori Populer</h3>
            <ul>
                <li><a href="/explore">Pembuatan Website</a></li>
                <li><a href="/explore">Desain Grafis & UI/UX</a></li>
                <li><a href="/explore">Penulisan Konten</a></li>
                <li><a href="/explore">Digital Marketing</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h3>Keamanan & Kepercayaan</h3>
            <p>🛡️ Transaksi aman dengan milestone terstruktur dan verifikasi ketat untuk setiap penyedia jasa.</p>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; {{ date('Y') }} SkillHub Indonesia. Seluruh hak cipta dilindungi undang-undang.
    </div>
</footer>

</body>
</html>
