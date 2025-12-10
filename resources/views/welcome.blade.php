<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant System</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-…" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    <style>
        /* ===== Base ===== */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #FFF7E6;
            color: #5A4635;
            scroll-behavior: smooth;
        }
        a { text-decoration: none; }
        ul { list-style: none; padding: 0; margin: 0; }

        /* ===== Navbar ===== */
        nav {
            width: 100%;
            padding: 15px 20px;
            background: #fff;
            box-shadow: 0 3px 12px rgba(0,0,0,0.08);
            position: fixed;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        /* Navbar Scrolled State */
        nav.scrolled { 
            background: #C67C41; 
            box-shadow: 0 3px 15px rgba(0,0,0,0.2); 
        }
        nav .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav h2 {
            font-size: 26px;
            color: #C67C41;
            font-weight: 700;
            letter-spacing: 1px;
            transition: color 0.3s;
        }
        nav.scrolled h2 { color: #fff; }
        nav ul {
            display: flex;
            gap: 25px;
        }
        nav ul li a {
            font-weight: 500;
            font-size: 16px;
            color: #5A4635;
            transition: all 0.3s;
            /* Added for icon alignment */
            display: flex; 
            align-items: center;
            gap: 6px;
        }
        nav.scrolled ul li a { color: #C67C41; }
        nav ul li a:hover { color: #C67C41; }
        nav.scrolled ul li a:hover { color: #5A4635; } /* Hover color on scrolled bar */
        .menu-toggle { display: none; font-size: 28px; cursor: pointer; }

        /* ===== Hero Section ===== */
        .hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding-top: 80px;
            position: relative;
            /* Dynamic Gradient Background */
            background: linear-gradient(135deg, #C67C41, #FFB46B, #C67C41);
            background-size: 200% 200%;
            animation: gradientShift 10s ease infinite;
            color: #fff;
            overflow: hidden;
        }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .hero-content {
            z-index: 10;
        }
        .hero h1 {
            font-size: 64px;
            margin: 0;
            font-weight: 700;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
            /* Initial Animation State */
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s ease forwards;
        }
        .hero p {
            font-size: 20px;
            margin-top: 15px;
            max-width: 700px;
            font-weight: 300;
            /* Initial Animation State */
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1.3s ease forwards;
            animation-delay: 0.3s; /* Delay for cascade effect */
        }
        .btn-box { 
            margin-top: 40px; 
            /* Initial Animation State */
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1.6s ease forwards;
            animation-delay: 0.6s; /* Delay for cascade effect */
        }
        .btn {
            padding: 14px 35px;
            border-radius: 30px;
            border: none;
            font-size: 17px;
            font-weight: 600;
            margin: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex; /* Align icon and text */
            align-items: center;
            gap: 8px;
        }
        .btn1 {
            background-color: #5A4635;
            color: #fff;
            box-shadow: 0 6px 15px rgba(90,70,53,0.3);
        }
        .btn2 {
            background: transparent;
            border: 2px solid #fff;
            color: #fff;
        }
        .btn:hover { transform: translateY(-3px); opacity: 0.9; }

        /* ===== Section ===== */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .section-title { text-align: center; padding-top: 60px; margin-bottom: 30px; }
        .section-title h2 { font-size: 36px; color: #5A4635; font-weight: 600; }

        .services {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
            gap: 30px;
            padding-bottom: 80px;
        }
        /* Feature Card Animation Class (Default Hidden) */
        .service-card {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            text-align: center;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            border-top: 5px solid #C67C41;
            cursor: pointer;
            /* Add initial hidden state for observer animation */
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        /* Class added by JavaScript when visible */
        .service-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }
        .service-card .icon {
            font-size: 48px;
            color: #C67C41;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .service-card:hover .icon { transform: scale(1.2); }
        .service-card h3 { color: #5A4635; margin-bottom: 10px; font-weight: 600; }
        .service-card p { font-size: 15px; line-height: 1.6; color: #5A4635; }

        /* ===== Footer ===== */
        footer { text-align: center; padding: 30px 20px; background: #fff; color: #5A4635; border-top: 1px solid #eee; font-size: 14px; }

        /* ===== Modal Login (kept minimal) ===== */
        .modal { display: none; position: fixed; z-index: 5000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.6); }
        .modal-content {
            background-color: #FFF7E6;
            margin: 10% auto;
            padding: 50px;
            border-radius: 15px;
            width: 50%;
            max-width: 400px;
            position: relative;
            box-shadow: 0 5px 25px rgba(0,0,0,0.3);
            animation: slideDown 0.5s ease forwards;
        }
        .close { position: absolute; right: 20px; top: 15px; font-size: 28px; font-weight: bold; color: #5A4635; cursor: pointer; }
        .modal-content h2 { text-align: center; margin-bottom: 25px; color: #C67C41; }
        .modal-content input { width: 100%; padding: 12px 15px; margin: 10px 0; border-radius: 8px; border: 1px solid #ccc; font-size: 16px; }
        .modal-content button { width: 100%; padding: 14px; border: none; border-radius: 25px; background-color: #C67C41; color: white; font-size: 18px; cursor: pointer; margin-top: 15px; transition: 0.3s; }
        .modal-content button:hover { opacity: 0.9; transform: scale(1.02); }

        /* ===== Keyframe Animations ===== */
        @keyframes fadeInUp { 0% { opacity: 0; transform: translateY(20px); } 100% { opacity: 1; transform: translateY(0); } }
        @keyframes slideDown { 0% { opacity: 0; transform: translateY(-20px); } 100% { opacity: 1; transform: translateY(0); } }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            .hero h1 { font-size: 48px; }
            nav ul { top: 58px; /* Adjusted position for mobile menu */ }
        }
    </style>
</head>
<body>

<nav>
    <div class="container nav-content">
        <h2><i class="fa-solid fa-utensils"></i>Restaurant System</h2>
        <ul id="nav-links">
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fas fa-utensils"></i> Dishes</a></li>
            <li><a href="#"><i class="fas fa-receipt"></i> Orders</a></li>
            <li><a href="#"><i class="fas fa-fire-burner"></i> Kitchen</a></li>
        </ul>
        <div class="menu-toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></div>
    </div>
</nav>

<div class="hero">
    <div class="hero-content">
        <h1>Manage Your Culinary World</h1>
        <p>Streamline your restaurant operations with our intuitive system.</p>

        <div class="btn-box">
            <button class="btn btn1" onclick="openLogin()"><i class="fas fa-sign-in-alt"></i> System Login</button>
            <a href="#" class="btn btn2"><i class="fas fa-eye"></i> View Demo</a>
        </div>
    </div>
</div>

<div class="container">
    <section class="section-title">
        <h2>System Features</h2>
    </section>
    <section class="services">
        <div class="service-card animate-on-scroll">
            <div class="icon"><i class="fas fa-utensils"></i></div>
            <h3>Dish Management</h3>
            <p>Easily add, update, and categorize menu items with custom details and images.</p>
        </div>

        <div class="service-card animate-on-scroll">
            <div class="icon"><i class="fas fa-box-open"></i></div>
            <h3>Real-time Orders</h3>
            <p>Track all incoming customer orders efficiently from placement to delivery.</p>
        </div>

        <div class="service-card animate-on-scroll">
            <div class="icon"><i class="fa-solid fa-kitchen-set"></i></div>
            <h3>Kitchen Display</h3>
            <p>A dedicated, clear panel for kitchen staff to view and process orders.</p>
        </div>

        <div class="service-card animate-on-scroll">
            <div class="icon"><i class="fas fa-chart-line"></i></div>
            <h3>Performance Analytics</h3>
            <p>Access daily sales reports, popular items, and key business insights.</p>
        </div>
    </section>
</div>

<footer>
    © 2025 Gourmet Dashboard — All Rights Reserved
</footer>

<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeLogin()">&times;</span>
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
            <input id="password" type="password" name="password" placeholder="Password" required>
          

            <button type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
        </form>
    </div>
</div>

<script>
    // 1. Mobile Menu Toggle
    function toggleMenu() {
        document.getElementById('nav-links').classList.toggle('active');
    }

    // 2. Modal Functions
    function openLogin() { document.getElementById('loginModal').style.display = 'block'; }
    function closeLogin() { document.getElementById('loginModal').style.display = 'none'; }
    window.onclick = function(event) {
        if (event.target == document.getElementById('loginModal')) {
            closeLogin();
        }
    }

    // 3. Navbar Scroll Effect (already in your original code, kept)
    window.addEventListener('scroll', function() {
        document.querySelector('nav').classList.toggle('scrolled', window.scrollY > 50);
    });

    // 4. Feature Card Scroll Animation (Intersection Observer)
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.2 // Trigger when 20% of the item is visible
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // Add the 'visible' class to trigger the CSS transition
                // Added a small delay for a staggered effect
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, index * 150); // Stagger delay of 150ms
                
                // Stop observing once it's animated
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all service cards
    document.querySelectorAll('.service-card').forEach(card => {
        observer.observe(card);
    });

</script>

</body>
</html>