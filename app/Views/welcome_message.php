<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muhammad Syamsi - Freelancer IT &amp; Web Developer</title>
    <script src="/_sdk/element_sdk.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <style>
        body {
            box-sizing: border-box;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            height: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #2d3748;
            background: #f7fafc;
            width: 100%;
            min-height: 100%;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            padding: 1rem 0;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2b6cb0;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #4a5568;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #2b6cb0;
        }

        /* Hero Section */
        #home {
            min-height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 6rem 2rem 4rem;
            width: 100%;
        }

        .hero-content {
            max-width: 1200px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-text h1 {
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
        }

        .hero-text h2 {
            font-size: 1.5rem;
            font-weight: 500;
            color: #e6f2ff;
            margin-bottom: 1.5rem;
        }

        .hero-text p {
            font-size: 1.1rem;
            color: #f0f4ff;
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.875rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-block;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: white;
            color: #667eea;
        }

        .btn-primary:hover {
            background: #f0f4ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: white;
            color: #667eea;
            transform: translateY(-2px);
        }

        .hero-illustration {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .illustration-box {
            width: 100%;
            max-width: 500px;
            height: 400px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        /* Section Styles */
        section {
            padding: 5rem 2rem;
            width: 100%;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 3rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: #667eea;
            border-radius: 2px;
        }

        /* About Section */
        #about {
            background: white;
        }

        .about-content {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 3rem;
            align-items: center;
        }

        .about-image {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .about-image svg {
            width: 200px;
            height: 200px;
        }

        .about-text h3 {
            font-size: 1.8rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
        }

        .about-text p {
            font-size: 1rem;
            color: #4a5568;
            line-height: 1.8;
            margin-bottom: 1rem;
            white-space: pre-line;
        }

        /* Skills Section */
        #skills {
            background: #f7fafc;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .skill-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .skill-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
        }

        .skill-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .skill-card h3 {
            font-size: 1.3rem;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .skill-card p {
            color: #718096;
            font-size: 0.95rem;
        }

        /* Portfolio Section */
        #portfolio {
            background: white;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
        }

        .portfolio-card {
            background: #f7fafc;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
        }

        .portfolio-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
        }

        .portfolio-image {
            height: 220px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            object-fit: cover;
            /* menjaga rapi tanpa distorsi */
            border-radius: 0 0 16px 16px;
            /* kalau ingin mengikuti bentuk card */
        }

        .portfolio-image svg {
            width: 120px;
            height: 120px;
        }

        .portfolio-info {
            padding: 1.5rem;
            padding-top: 3rem;
        }

        .portfolio-info h3 {
            font-size: 1.3rem;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .portfolio-info p {
            color: #718096;
            font-size: 0.95rem;
        }

        @media (max-width: 576px) {
            .portfolio-info {
                padding-top: 1.5rem;
            }

            .portfolio-image {
                height: 180px;


            }

            /* Experience Section */
            #experience {
                background: #f7fafc;
            }

            .timeline {
                position: relative;
                max-width: 800px;
                margin: 0 auto;
            }

            .timeline::before {
                content: '';
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                width: 4px;
                height: 100%;
                background: #e2e8f0;
            }

            .timeline-item {
                display: flex;
                margin-bottom: 3rem;
                position: relative;
            }

            .timeline-item:nth-child(odd) {
                flex-direction: row;
            }

            .timeline-item:nth-child(even) {
                flex-direction: row-reverse;
            }

            .timeline-content {
                background: white;
                padding: 2rem;
                border-radius: 12px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
                width: calc(50% - 2rem);
                position: relative;
            }

            .timeline-dot {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                width: 20px;
                height: 20px;
                background: #667eea;
                border-radius: 50%;
                border: 4px solid white;
                box-shadow: 0 0 0 4px #e2e8f0;
            }

            .timeline-content h3 {
                font-size: 1.3rem;
                color: #2d3748;
                margin-bottom: 0.5rem;
            }

            .timeline-content .role {
                color: #667eea;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }

            .timeline-content p {
                color: #718096;
                font-size: 0.95rem;
            }

            /* Contact Section */
            #contact {
                background: white;
            }

            .contact-content {
                max-width: 600px;
                margin: 0 auto;
                text-align: center;
            }

            .contact-content h3 {
                font-size: 1.8rem;
                color: #2d3748;
                margin-bottom: 1rem;
            }

            .contact-content p {
                font-size: 1.1rem;
                color: #718096;
                margin-bottom: 2rem;
            }

            .contact-links {
                display: flex;
                gap: 1.5rem;
                justify-content: center;
                flex-wrap: wrap;
            }

            .contact-link {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                padding: 1rem 2rem;
                background: #f7fafc;
                border-radius: 12px;
                text-decoration: none;
                color: #2d3748;
                font-weight: 600;
                transition: all 0.3s;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            }

            .contact-link:hover {
                background: #667eea;
                color: white;
                transform: translateY(-3px);
                box-shadow: 0 6px 20px rgba(102, 126, 234, 0.3);
            }

            .contact-icon {
                font-size: 1.5rem;
            }

            /* Footer */
            footer {
                background: #2d3748;
                color: white;
                padding: 3rem 2rem;
                text-align: center;
                width: 100%;
            }

            footer h3 {
                font-size: 1.5rem;
                margin-bottom: 0.5rem;
            }

            footer p {
                color: #cbd5e0;
                margin-bottom: 1.5rem;
            }

            .footer-social {
                display: flex;
                gap: 1rem;
                justify-content: center;
                margin-top: 1.5rem;
            }

            .social-link {
                width: 40px;
                height: 40px;
                background: #4a5568;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                text-decoration: none;
                transition: all 0.3s;
            }

            .social-link:hover {
                background: #667eea;
                transform: translateY(-3px);
            }

            /* Responsive */
            @media (max-width: 968px) {
                .hero-content {
                    grid-template-columns: 1fr;
                    text-align: center;
                }

                .hero-text h1 {
                    font-size: 2.5rem;
                }

                .hero-buttons {
                    justify-content: center;
                }

                .about-content {
                    grid-template-columns: 1fr;
                    text-align: center;
                }

                .about-image {
                    margin: 0 auto;
                }

                .nav-links {
                    gap: 1rem;
                    font-size: 0.9rem;
                }

                .timeline::before {
                    left: 20px;
                }

                .timeline-item {
                    flex-direction: row !important;
                }

                .timeline-content {
                    width: calc(100% - 60px);
                    margin-left: 60px;
                }

                .timeline-dot {
                    left: 20px;
                }
            }

            @media (max-width: 640px) {
                .nav-container {
                    flex-direction: column;
                    gap: 1rem;
                }

                .nav-links {
                    flex-wrap: wrap;
                    justify-content: center;
                }

                section {
                    padding: 3rem 1rem;
                }

                .hero-text h1 {
                    font-size: 2rem;
                }

                .section-title {
                    font-size: 2rem;
                }
            }
    </style>
    <style>
        @view-transition {
            navigation: auto;
        }
    </style>
    <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
    <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
</head>

<body><!-- Navigation -->
    <nav>
        <div class="nav-container">
            <div class="logo" id="nav-logo">
                MS
            </div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#experience">Experience</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav><!-- Hero Section -->
    <section id="home">
        <div class="hero-content">
            <div class="hero-text">
                <h1 id="hero-name">Muhammad Syamsi</h1>
                <h2 id="hero-subtitle">Freelancer IT &amp; Web Developer</h2>
                <p id="hero-description">Menguasai bahasa pemrograman web dan fokus pada framework CodeIgniter 4. Siap membantu pembuatan website, sistem informasi, dan aplikasi berbasis web.</p>
                <div class="hero-buttons"><a href="#contact" class="btn btn-primary">Contact Me</a> <a href="#portfolio" class="btn btn-secondary">Portfolio</a>
                </div>
            </div>
            <div class="hero-illustration">
                <div class="illustration-box">
                    <img src="<?= base_url('assets/img/illustrasi.png'); ?>" alt="Ilustrasi" class="w-full h-auto object-cover">
                </div>
            </div>
        </div>
    </section><!-- About Section -->
    <section id="about">
        <div class="container">
            <h2 class="section-title">Tentang Saya</h2>
            <div class="about-content">
                <div class="about-image">
                    <svg viewbox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="100" cy="70" r="30" fill="white" opacity="0.9" />
                        <path d="M 100 100 Q 60 120, 60 160 L 140 160 Q 140 120, 100 100" fill="white" opacity="0.9" />
                        <rect x="70" y="120" width="60" height="50" rx="5" fill="rgba(255,255,255,0.3)" />
                        <line x1="80" y1="130" x2="120" y2="130" stroke="rgba(102, 126, 234, 1)" stroke-width="2" />
                        <line x1="80" y1="140" x2="110" y2="140" stroke="rgba(102, 126, 234, 1)" stroke-width="2" />
                        <line x1="80" y1="150" x2="115" y2="150" stroke="rgba(102, 126, 234, 1)" stroke-width="2" />
                    </svg>
                </div>
                <div class="about-text">
                    <h3>Profile</h3>
                    <p id="about-text">Saya Muhammad Syamsi, seorang Freelance bidang IT. Keahlian saya adalah menguasai bahasa pemrograman web dan saat ini fokus pada satu framework yaitu CI4. Saya memiliki pengalaman kerja beragam:
                    <ul>
                        <li>? Saat menjadi guru (TKJ &amp; Multimedia), saya membuat media pembelajaran berbasis PC dan Android.</li>
                        <li>? Saat menjadi admin support perusahaan, saya mengasah skill manajemen dan penggunaan Microsoft Office.</li>
                        <li>? Saat ini saya fokus mengembangkan sistem informasi: pemasukan, data santri, data guru, tunggakan, seragam, jadwal, hingga absensi mengajar di Pondok Darul Hijrah Pandaan.</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </section><!-- Skills Section -->
    <section id="skills">
        <div class="container">
            <h2 class="section-title">Keahlian</h2>
            <div class="skills-grid">
                <div class="skill-card">
                    <div class="skill-icon">
                        ?
                    </div>
                    <h3>Web Programming</h3>
                    <p>PHP, HTML, CSS, JavaScript</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">
                        ?
                    </div>
                    <h3>CodeIgniter 4</h3>
                    <p>Framework utama untuk development</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">
                        ??
                    </div>
                    <h3>Database</h3>
                    <p>MySQL, Data Management</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">
                        ?
                    </div>
                    <h3>MS Office</h3>
                    <p>Excel, Word, PowerPoint</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">
                        ?
                    </div>
                    <h3>Git &amp; Version Control</h3>
                    <p>Source code management</p>
                </div>
                <div class="skill-card">
                    <div class="skill-icon">
                        ?
                    </div>
                    <h3>Administrasi</h3>
                    <p>Manajemen data &amp; sistem</p>
                </div>
            </div>
        </div>
    </section><!-- Portfolio Section -->
    <section id="portfolio">
        <div class="container">
            <h2 class="section-title">Portfolio</h2>
            <div class="portfolio-grid">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="<?= base_url('assets/img/portofolio1.png'); ?>" alt="Portfolio 1" class="w-full h-auto object-cover">
                    </div>
                    <div class="portfolio-info">
                        <h3>Sistem Informasi Pemasukan</h3>
                        <p>Aplikasi pencatatan dan laporan keuangan</p>
                    </div>
                </div>
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="<?= base_url('assets/img/portofolio2.png'); ?>" alt="Portfolio 2" class="w-full h-auto object-cover">
                    </div>
                    <div class="portfolio-info">
                        <h3>Sistem Data Santri</h3>
                        <p>Manajemen database santri lengkap</p>
                    </div>
                </div>
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="<?= base_url('assets/img/portofolio3.png'); ?>" alt="Portfolio 3" class="w-full h-auto object-cover">
                    </div>
                    <div class="portfolio-info">
                        <h3>Sistem Data Guru</h3>
                        <p>Database dan profil tenaga pengajar</p>
                    </div>
                </div>
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="<?= base_url('assets/img/Portfolio4.png'); ?>" alt="Portfolio 4" class="w-full h-auto object-cover">
                    </div>
                    <div class="portfolio-info">
                        <h3>Sistem Tunggakan</h3>
                        <p>Monitoring pembayaran dan tunggakan</p>
                    </div>
                </div>
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="<?= base_url('assets/img/Portfolio5.png'); ?>" alt="Portfolio 5" class="w-full h-auto object-cover">
                    </div>
                    <div class="portfolio-info">
                        <h3>Sistem Jadwal &amp; Absensi</h3>
                        <p>Penjadwalan dan presensi mengajar</p>
                    </div>
                </div>
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="<?= base_url('assets/img/Portfolio6.png'); ?>" alt="Portfolio 6" class="w-full h-auto object-cover">
                    </div>
                    <div class="portfolio-info">
                        <h3>Media Pembelajaran</h3>
                        <p>Konten edukatif PC &amp; Android</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- Experience Section -->
    <section id="experience">
        <div class="container">
            <h2 class="section-title">Pengalaman</h2>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="role">
                            ? Pendidik
                        </div>
                        <h3>Guru TKJ &amp; Multimedia</h3>
                        <p>Mengajar siswa SMK dan membuat media pembelajaran interaktif berbasis PC dan Android untuk meningkatkan kualitas pembelajaran.</p>
                    </div>
                    <div class="timeline-dot"></div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="role">
                            ? Administrasi
                        </div>
                        <h3>Admin Support Perusahaan</h3>
                        <p>Mengelola dokumentasi, administrasi, dan data perusahaan. Mengasah kemampuan Microsoft Office dan manajemen sistem informasi.</p>
                    </div>
                    <div class="timeline-dot"></div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="role">
                            ??? Developer
                        </div>
                        <h3>Developer Sistem Informasi</h3>
                        <p>Pondok Darul Hijrah Pandaan - Mengembangkan berbagai sistem informasi: pemasukan, data santri, data guru, tunggakan, seragam, jadwal, dan absensi mengajar menggunakan CodeIgniter 4.</p>
                    </div>
                    <div class="timeline-dot"></div>
                </div>
            </div>
        </div>
    </section><!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <h2 class="section-title">Hubungi Saya</h2>
            <div class="contact-content">
                <h3 id="contact-title">Mari Berkolaborasi</h3>
                <p>Siap membantu project web development Anda dengan CodeIgniter 4</p>
                <div class="contact-links"><a href="https://wa.me/6289520821215" target="_blank" rel="noopener noreferrer" class="contact-link"> <span class="contact-icon">?</span> WhatsApp </a> <a href="https://instagram.com/m_syamsi" target="_blank" rel="noopener noreferrer" class="contact-link"> <span class="contact-icon">?</span> Instagram </a> <a href="https://tiktok.com/@syamsproject.id" target="_blank" rel="noopener noreferrer" class="contact-link"> <span class="contact-icon">?</span> TikTok </a>
                </div>
            </div>
        </div>
    </section><!-- Footer -->
    <footer>
        <h3>Muhammad Syamsi</h3>
        <p id="footer-tagline">Freelance IT ? Web Developer (CI4)</p>
        <div class="footer-social"><a href="https://wa.me/6289520821215" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="WhatsApp">?</a> <a href="https://instagram.com/m_syamsi" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="Instagram">?</a> <a href="https://tiktok.com/@syamsproject.id" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="TikTok">?</a>
        </div>
        <p style="margin-top: 2rem; font-size: 0.9rem; opacity: 0.8;">� 2024 Muhammad Syamsi. All rights reserved.</p>
    </footer>
    <script>
        const defaultConfig = {
            background_color: "#667eea",
            surface_color: "#ffffff",
            text_color: "#2d3748",
            primary_action_color: "#667eea",
            secondary_action_color: "#4a5568",
            font_family: "Poppins",
            font_size: 16,
            hero_name: "Muhammad Syamsi",
            hero_subtitle: "Freelancer IT & Web Developer",
            hero_description: "Menguasai bahasa pemrograman web dan fokus pada framework CodeIgniter 4. Siap membantu pembuatan website, sistem informasi, dan aplikasi berbasis web.",
            about_text: "Saya Muhammad Syamsi, seorang Freelance bidang IT. Keahlian saya adalah menguasai bahasa pemrograman web dan saat ini fokus pada satu framework yaitu CI4.\n\nSaya memiliki pengalaman kerja beragam:\n? Saat menjadi guru (TKJ & Multimedia), saya membuat media pembelajaran berbasis PC dan Android.\n? Saat menjadi admin support perusahaan, saya mengasah skill manajemen dan penggunaan Microsoft Office.\n? Saat ini saya fokus mengembangkan sistem informasi: pemasukan, data santri, data guru, tunggakan, seragam, jadwal, hingga absensi mengajar di Pondok Darul Hijrah Pandaan.",
            contact_title: "Mari Berkolaborasi",
            footer_tagline: "Freelance IT ? Web Developer (CI4)"
        };

        async function onConfigChange(config) {
            const customFont = config.font_family || defaultConfig.font_family;
            const baseFontStack = 'sans-serif';
            const baseSize = config.font_size || defaultConfig.font_size;

            document.body.style.fontFamily = `${customFont}, ${baseFontStack}`;

            const backgroundColor = config.background_color || defaultConfig.background_color;
            const surfaceColor = config.surface_color || defaultConfig.surface_color;
            const textColor = config.text_color || defaultConfig.text_color;
            const primaryActionColor = config.primary_action_color || defaultConfig.primary_action_color;
            const secondaryActionColor = config.secondary_action_color || defaultConfig.secondary_action_color;

            document.getElementById('home').style.background = `linear-gradient(135deg, ${backgroundColor} 0%, ${backgroundColor} 100%)`;

            const sections = document.querySelectorAll('section');
            sections.forEach((section, index) => {
                if (section.id !== 'home') {
                    section.style.background = index % 2 === 0 ? surfaceColor : '#f7fafc';
                }
            });

            document.querySelectorAll('.section-title, h1, h2, h3, p, .nav-links a').forEach(el => {
                el.style.color = textColor;
            });

            document.querySelectorAll('.skill-card, .portfolio-card, .timeline-content, .about-image, .portfolio-image').forEach(el => {
                el.style.background = surfaceColor;
            });

            document.querySelectorAll('.btn-primary').forEach(btn => {
                btn.style.background = surfaceColor;
                btn.style.color = primaryActionColor;
            });

            document.querySelectorAll('.timeline-dot').forEach(dot => {
                dot.style.background = primaryActionColor;
            });

            document.querySelectorAll('.contact-link:hover, .social-link:hover').forEach(link => {
                link.addEventListener('mouseenter', function() {
                    this.style.background = primaryActionColor;
                });
                link.addEventListener('mouseleave', function() {
                    this.style.background = secondaryActionColor;
                });
            });

            document.querySelector('.section-title::after') && document.querySelectorAll('.section-title').forEach(title => {
                const style = document.createElement('style');
                style.textContent = `.section-title::after { background: ${primaryActionColor} !important; }`;
                document.head.appendChild(style);
            });

            const heroTextElements = document.querySelectorAll('#home h1, #home h2, #home p');
            heroTextElements.forEach(el => {
                el.style.color = 'white';
            });

            document.body.style.fontSize = `${baseSize}px`;
            document.querySelectorAll('h1').forEach(el => el.style.fontSize = `${baseSize * 2.2}px`);
            document.querySelectorAll('h2').forEach(el => el.style.fontSize = `${baseSize * 1.6}px`);
            document.querySelectorAll('h3').forEach(el => el.style.fontSize = `${baseSize * 1.3}px`);
            document.querySelectorAll('p').forEach(el => el.style.fontSize = `${baseSize}px`);

            document.getElementById('hero-name').textContent = config.hero_name || defaultConfig.hero_name;
            document.getElementById('hero-subtitle').textContent = config.hero_subtitle || defaultConfig.hero_subtitle;
            document.getElementById('hero-description').textContent = config.hero_description || defaultConfig.hero_description;
            document.getElementById('about-text').textContent = config.about_text || defaultConfig.about_text;
            document.getElementById('contact-title').textContent = config.contact_title || defaultConfig.contact_title;
            document.getElementById('footer-tagline').textContent = config.footer_tagline || defaultConfig.footer_tagline;
        }

        if (window.elementSdk) {
            window.elementSdk.init({
                defaultConfig,
                onConfigChange,
                mapToCapabilities: (config) => ({
                    recolorables: [{
                            get: () => config.background_color || defaultConfig.background_color,
                            set: (value) => {
                                config.background_color = value;
                                window.elementSdk.setConfig({
                                    background_color: value
                                });
                            }
                        },
                        {
                            get: () => config.surface_color || defaultConfig.surface_color,
                            set: (value) => {
                                config.surface_color = value;
                                window.elementSdk.setConfig({
                                    surface_color: value
                                });
                            }
                        },
                        {
                            get: () => config.text_color || defaultConfig.text_color,
                            set: (value) => {
                                config.text_color = value;
                                window.elementSdk.setConfig({
                                    text_color: value
                                });
                            }
                        },
                        {
                            get: () => config.primary_action_color || defaultConfig.primary_action_color,
                            set: (value) => {
                                config.primary_action_color = value;
                                window.elementSdk.setConfig({
                                    primary_action_color: value
                                });
                            }
                        },
                        {
                            get: () => config.secondary_action_color || defaultConfig.secondary_action_color,
                            set: (value) => {
                                config.secondary_action_color = value;
                                window.elementSdk.setConfig({
                                    secondary_action_color: value
                                });
                            }
                        }
                    ],
                    borderables: [],
                    fontEditable: {
                        get: () => config.font_family || defaultConfig.font_family,
                        set: (value) => {
                            config.font_family = value;
                            window.elementSdk.setConfig({
                                font_family: value
                            });
                        }
                    },
                    fontSizeable: {
                        get: () => config.font_size || defaultConfig.font_size,
                        set: (value) => {
                            config.font_size = value;
                            window.elementSdk.setConfig({
                                font_size: value
                            });
                        }
                    }
                }),
                mapToEditPanelValues: (config) => new Map([
                    ["hero_name", config.hero_name || defaultConfig.hero_name],
                    ["hero_subtitle", config.hero_subtitle || defaultConfig.hero_subtitle],
                    ["hero_description", config.hero_description || defaultConfig.hero_description],
                    ["about_text", config.about_text || defaultConfig.about_text],
                    ["contact_title", config.contact_title || defaultConfig.contact_title],
                    ["footer_tagline", config.footer_tagline || defaultConfig.footer_tagline]
                ])
            });
        }
    </script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML = "window.__CF$cv$params={r:'9a64fce475d99cc8',t:'MTc2NDQ0OTUzNy4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
</body>

</html>