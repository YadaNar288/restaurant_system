<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spice POS System | Warm Theme</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* ===== Variables & Base - WARM SPICE (Orange & Brown) ===== */
        :root {
            --color-primary: #FF8C00; /* Burnt Orange/Cinnamon */
            --color-secondary: #E67E22; /* Slightly darker orange for hover */
            --color-text-dark: #5D4037; /* Rich Chocolate Brown */
            --color-text-light: #795548; /* Medium Brown */
            --color-background: #FCF8F5; /* Creamy Off-White */
            --color-section-bg: #FFFFFF; 
            --color-contrast-bg: #F0E6D8; /* Light Beige contrast for hero */
            --color-white: #fff;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-background);
            color: var(--color-text-dark);
            scroll-behavior: smooth;
        }
        a { text-decoration: none; }
        ul { list-style: none; padding: 0; margin: 0; }
        .container { max-width: 1200px; margin:0 auto; padding:0 20px; }

        /* ===== Navbar ===== */
        nav {
            width: 100%;
            padding: 15px 0;
            background: var(--color-white);
            box-shadow: 0 1px 10px rgba(0,0,0,0.08);
            position: fixed;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        nav.scrolled { 
            background: var(--color-text-dark); /* Dark Brown Navbar when scrolled */
            box-shadow: 0 3px 15px rgba(0,0,0,0.3); 
        }
        nav .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav h2 {
            font-size: 26px;
            color: var(--color-primary);
            font-weight: 700;
            transition: color 0.3s;
        }
        nav.scrolled h2 { color: var(--color-primary); }
        nav ul {
            display: flex;
            gap: 30px;
        }
        nav ul li a {
            font-weight: 500;
            font-size: 16px;
            color: var(--color-text-dark);
            transition: all 0.3s;
            display: flex; 
            align-items: center;
            gap: 6px;
        }
        nav.scrolled ul li a { color: var(--color-white); }
        nav ul li a:hover { color: var(--color-primary); }
        nav.scrolled ul li a:hover { color: var(--color-primary); }
        .menu-toggle { display: none; font-size: 28px; cursor: pointer; color: var(--color-text-dark); }
        nav.scrolled .menu-toggle { color: var(--color-white); }

        /* ===== Hero Section - Warm Contrast ===== */
        .hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding-top: 80px;
            position: relative;
            background: var(--color-contrast-bg); /* Light Beige background */
            color: var(--color-text-dark);
        }

        .hero-content { z-index: 10; padding: 0 20px; }
        .hero h1 { 
            animation-delay: 0.3s; 
            font-size: 68px; 
            margin:0; 
            font-weight:900; 
            letter-spacing: -1px;
            color: var(--color-text-dark);
        }
        .hero p { 
            animation-delay: 0.6s; 
            font-size: 22px; 
            margin-top:20px; 
            max-width:800px; 
            font-weight:300; 
            color: var(--color-text-light);
        }
        .btn-box { animation-delay: 0.9s; margin-top:50px; }

        /* Button Styling */
        .btn {
            padding: 16px 40px;
            border-radius: 8px; /* Slightly rounded edges */
            border: none;
            font-size: 18px;
            font-weight: 600;
            margin: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .btn1 { 
            background-color: var(--color-primary); 
            color: var(--color-white); 
            box-shadow:0 4px 15px rgba(255, 140, 0, 0.4);
        }
        .btn2 { 
            background: transparent; 
            border:2px solid var(--color-text-dark); 
            color:var(--color-text-dark); 
        }
        .btn1:hover { transform: translateY(-3px); background-color: var(--color-secondary); box-shadow:0 8px 20px rgba(255, 140, 0, 0.6); }
        .btn2:hover { background-color: var(--color-text-dark); color: var(--color-white); transform: translateY(-3px); }


        /* ===== Section Styling ===== */
        section { padding: 100px 0; }
        .features-section { background-color: var(--color-section-bg); }

        .section-title { text-align: center; margin-bottom: 60px; opacity:0; transform:translateY(20px); transition: all 0.8s ease; }
        .section-title.visible { opacity:1; transform:translateY(0); }
        .section-title h2 { 
            font-size:38px; 
            color:var(--color-text-dark); 
            font-weight:700; 
            margin-bottom: 10px; 
        }
        .section-title p { color: var(--color-text-light); font-size: 18px; font-weight: 300; }

        /* Services Grid */
        .services {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(280px,1fr));
            gap: 40px;
        }
        .service-card {
            background: var(--color-white);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            text-align: center;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            border-bottom: 5px solid var(--color-primary); /* Accent line */
            cursor: default;
            opacity: 0;
            transform: translateY(30px);
        }
        .service-card.visible { opacity: 1; transform: translateY(0); }
        .service-card:hover { transform: translateY(-5px); box-shadow:0 15px 30px rgba(0,0,0,0.1); }
        .service-card .icon { font-size:55px; color:var(--color-primary); margin-bottom:25px; transition: transform 0.3s ease; }
        .service-card h3 { color:var(--color-text-dark); margin-bottom:12px; font-weight:700; font-size: 22px; }
        .service-card p { font-size:16px; line-height:1.7; color:var(--color-text-light); }

        /* ===== Why Choose Us Section (Dark Contrast) ===== */
        .about-section { 
            background-color: var(--color-text-dark); 
            color: var(--color-white);
            padding-bottom: 100px; 
        }
        .about-section .section-title h2 { color: var(--color-white); }
        .about-section .section-title p { color: #d7ccc8; } /* Lighter text for dark bg */

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }
        .about-text h3 { font-size: 30px; color: var(--color-primary); margin-bottom: 20px; font-weight: 600; }
        .about-text p { font-size: 17px; line-height: 1.8; margin-bottom: 30px; color: #d7ccc8; }
        .about-list li { 
            margin-bottom: 15px; 
            font-weight: 400; 
            color: var(--color-white); 
            display: flex; 
            align-items: flex-start; 
            gap: 10px; 
            font-size: 17px;
        }
        .about-list li i { color: var(--color-primary); font-size: 20px; margin-top: 3px; }

        .about-image { 
            background: var(--color-text-light); /* Medium brown for contrast image */
            min-height: 350px; 
            border-radius: 12px; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            color: var(--color-white); 
            font-weight: 300;
            font-size: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.8s ease;
        }
        .about-image.visible { opacity: 1; transform: scale(1); }

        /* ===== Footer ===== */
        footer { 
            text-align:center; 
            padding:30px 20px; 
            background:var(--color-text-dark); 
            color:#aaa; 
            font-size:14px; 
            border-top: 5px solid var(--color-primary);
        }

        /* ===== Modal Login (Warm look) ===== */
        .modal { display:none; position:fixed; z-index:5000; left:0; top:0; width:100%; height:100%; background-color: rgba(0,0,0,0.8);}
        .modal-content {
            background-color: var(--color-white);
            margin:10% auto; padding:40px; border-radius:10px; width:50%; max-width:400px; position:relative;
            box-shadow:0 10px 40px rgba(0,0,0,0.5);
            animation: slideDown 0.5s ease forwards;
        }
        .close { position:absolute; right:20px; top:15px; font-size:32px; font-weight:bold; color:var(--color-text-dark); cursor:pointer; opacity: 0.7; }
        .modal-content h2 { text-align:center; margin-bottom:30px; color:var(--color-primary); font-size: 28px; font-weight: 700; }
        .modal-content input { 
            width:100%; padding:14px 15px; margin:15px 0; border-radius:8px; border:1px solid #ccc; font-size:16px; 
            box-sizing: border-box; 
        }
        .modal-content button { 
            width:100%; padding:16px; border:none; border-radius:8px; background-color:var(--color-primary); color:white; font-size:18px; cursor:pointer; margin-top:20px; transition:0.3s; 
        }
        .modal-content button:hover { opacity:0.9; transform:scale(1.0); background-color: var(--color-secondary); box-shadow:none;}

        /* ===== Keyframes & Animations (Kept) ===== */
        @keyframes fadeInUp { 0%{opacity:0;transform:translateY(20px);}100%{opacity:1;transform:translateY(0);} }
        .hero h1, .hero p, .btn-box { opacity: 0; transform: translateY(20px); animation: fadeInUp 1s ease forwards; }
        @keyframes slideDown { 0%{opacity:0;transform:translateY(-20px);}100%{opacity:1;transform:translateY(0);} }

        /* ===== Responsive ===== */
        @media (max-width: 992px) {
            .hero h1 { font-size:54px; }
            .about-content { grid-template-columns: 1fr; }
            .about-image { min-height: 250px; }
        }
        @media (max-width: 768px) {
            .hero h1 { font-size:40px; }
            .hero p { font-size: 18px; }
            .section-title h2 { font-size: 30px; }
            .modal-content { width: 90%; margin: 20% auto; }

            nav ul { 
                top: 56px; flex-direction: column; gap:15px; background:var(--color-white); position:absolute; right:0; display:none; 
                padding:20px; border-radius:0 0 8px 8px; min-width: 180px; box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            }
            nav ul.active { display:flex; }
            .menu-toggle { display:block; }
            nav.scrolled ul { background: var(--color-white); }
        }
    </style>
</head>
<body>

<nav>
    <div class="container nav-content">
        <h2><i class="fa-solid fa-pepper-hot"></i> SPICE POS SYSTEM</h2>
        <ul id="nav-links">
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="#features"><i class="fas fa-list-check"></i> Features</a></li>
            <li><a href="#why-us"><i class="fas fa-circle-question"></i> Why Us?</a></li>
            <li><a href="#" onclick="openLogin()"><i class="fas fa-sign-in-alt"></i> Login</a></li>
        </ul>
        <div class="menu-toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></div>
    </div>
</nav>

<div class="hero">
    <div class="hero-content">
        <h1>THE HEART OF YOUR RESTAURANT</h1>
        <p>A warm, reliable platform designed for the fast-paced world of food service.</p>
        <div class="btn-box">
            <button class="btn btn1" onclick="openLogin()"><i class="fas fa-sign-in-alt"></i> Access Dashboard</button>
            <a href="#features" class="btn btn2"><i class="fas fa-arrow-down"></i> Explore Features</a>
        </div>
    </div>
</div>

<section id="features" class="features-section">
    <div class="container">
        <div class="section-title animate-on-scroll">
            <h2>Core Operational Tools</h2>
            <p>From table management to inventory, we have you covered.</p>
        </div>
        <div class="services">
            <div class="service-card animate-on-scroll" style="animation-delay: 0.1s;">
                <div class="icon"><i class="fas fa-receipt"></i></div>
                <h3>Quick Order Processing</h3>
                <p>Intuitive interface for taking dine-in, takeout, and delivery orders instantly.</p>
            </div>
            <div class="service-card animate-on-scroll" style="animation-delay: 0.2s;">
                <div class="icon"><i class="fas fa-table"></i></div>
                <h3>Floor & Table Mapping</h3>
                <p>Visual map of your dining room for efficient table assignment and tracking.</p>
            </div>
            <div class="service-card animate-on-scroll" style="animation-delay: 0.3s;">
                <div class="icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                <h3>Inventory Control</h3>
                <p>Track ingredients and supplies to minimize waste and ensure you never run out of stock.</p>
            </div>
            <div class="service-card animate-on-scroll" style="animation-delay: 0.4s;">
                <div class="icon"><i class="fas fa-chart-pie"></i></div>
                <h3>Daily Sales Insights</h3>
                <p>Automated reports on revenue, popular dishes, and labor costs delivered daily.</p>
            </div>
        </div>
    </div>
</section>

<section id="why-us" class="about-section">
    <div class="container">
        <div class="section-title animate-on-scroll">
            <h2>Serving Up Success</h2>
            <p>The reasons why restaurants choose our reliable, warm platform.</p>
        </div>
        <div class="about-content">
            <div class="about-text animate-on-scroll" style="transition-delay: 0.2s;">
                <h3>A System That Feels Right</h3>
                <p>Our warm, simple design ensures that new staff members feel comfortable and confident using the system from day one. High-friction POS software leads to errors—ours is built for seamless, stress-free transactions.</p>
                <ul class="about-list">
                    <li><i class="fas fa-check-circle"></i> **Intuitive User Flow:** Designed by industry veterans.</li>
                    <li><i class="fas fa-check-circle"></i> **Reliable & Fast:** Built on modern, secure architecture.</li>
                    <li><i class="fas fa-check-circle"></i> **24/7 Priority Support:** Get help anytime, day or night.</li>
                    <li><i class="fas fa-check-circle"></i> **Mobile Compatible:** Manage remotely from any device.</li>
                </ul>
            </div>
            <div class="about-image animate-on-scroll" style="transition-delay: 0.5s;">
                <p>Placeholder: Warm-toned POS Interface Mockup</p>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <p>© 2025 Spice POS System — A Modern Blend of Warmth and Efficiency.</p>
    </div>
</footer>

<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeLogin()">&times;</span>
        <h2><i class="fas fa-lock"></i> Staff Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input id="email" type="email" name="email" placeholder="Staff Email ID" value="{{ old('email') }}" required autofocus>
            <input id="password" type="password" name="password" placeholder="System Password" required>
            <button type="submit"><i class="fas fa-arrow-right-to-bracket"></i> Login to Dashboard</button>
        </form>
    </div>
</div>

<script>
    // Mobile Menu Toggle
    function toggleMenu() { document.getElementById('nav-links').classList.toggle('active'); }

    // Modal
    function openLogin() { document.getElementById('loginModal').style.display='block'; }
    function closeLogin() { document.getElementById('loginModal').style.display='none'; }
    window.onclick = function(event) {
        if(event.target == document.getElementById('loginModal')) { closeLogin(); }
    }

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        document.querySelector('nav').classList.toggle('scrolled', window.scrollY > 50);
    });

    // Universal Scroll Animation Observer
    const observerOptions = { root:null, rootMargin:'0px', threshold:0.1 };
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry, index) => {
            if(entry.isIntersecting){
                // Apply a sequential delay for feature cards only
                const delay = entry.target.classList.contains('service-card') ? (index * 120) : 0;
                setTimeout(()=>{ entry.target.classList.add('visible'); }, delay);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements with the animation class
    document.querySelectorAll('.animate-on-scroll, .section-title, .about-image').forEach(el => observer.observe(el));


    // Smooth scroll for navbar links
    document.querySelectorAll('nav ul li a[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e){
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if(target) target.scrollIntoView({ behavior:'smooth', block:'start' });
        });
    });
</script>

</body>
</html>