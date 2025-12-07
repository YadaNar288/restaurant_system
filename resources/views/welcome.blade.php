<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gourmet Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #FFF7E6; 
        color: #5A4635; 
    }
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    nav {
        width: 100%;
        padding: 15px 0;
        background: #ffffff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        position: fixed;
        top: 0;
        z-index: 2000;
    }
    nav .nav-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    nav h2 {
        margin: 0;
        font-size: 28px;
        color: #C67C41; 
        letter-spacing: 1px;
        font-weight: 700;
    }
    nav ul {
        list-style: none;
        display: flex;
        gap: 30px; 
        margin: 0;
        padding: 0;
    }
    nav ul li a {
        text-decoration: none;
        color: #5A4635;
        font-size: 16px;
        font-weight: 500;
        transition: color 0.3s;
    }
    nav ul li a:hover {
        color: #C67C41;
    }
    .menu-toggle {
        display: none; 
        font-size: 30px;
        cursor: pointer;
        color: #5A4635;
        line-height: 0.5;
    }
    .hero {
        min-height: 100vh; 
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding-top: 80px; 
        position: relative;
        color: #fff; 
        background: #C67C41; /* simple background for hero */
    }
    .hero-content {
        position: relative;
        z-index: 2; 
        padding: 20px;
    }
    .hero h1 {
        font-size: 64px; 
        margin: 0 0 10px 0;
        font-weight: 700;
        color: #ffffff; 
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
    .hero p {
        max-width: 700px;
        font-size: 20px; 
        margin-top: 15px;
        font-weight: 300;
        color: #f0f0f0;
    }
    .btn-box {
        margin-top: 40px;
    }
    .btn {
        padding: 14px 35px; 
        border-radius: 30px;
        border: none;
        cursor: pointer;
        font-size: 17px;
        font-weight: 600;
        margin: 10px;
        transition: all 0.3s ease;
        display: inline-block;
        text-decoration: none;
    }
    .btn1 {
        background-color: #C67C41; 
        color: #fff;
        box-shadow: 0 4px 10px rgba(198, 124, 65, 0.4);
    }
    .btn2 {
        background: transparent;
        border: 2px solid #fff; 
        color: #fff;
    }
    .btn:hover {
        transform: translateY(-2px); 
        opacity: 0.9;
    }
    .section-title {
        text-align: center;
        padding-top: 60px;
        margin-bottom: 20px;
    }
    .section-title h2 {
        font-size: 36px;
        color: #5A4635;
        font-weight: 600;
    }
    .services {
        padding: 40px 0 80px 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
        gap: 30px;
    }
    .service-card {
        background: #FFFFFF;
        border-radius: 12px;
        padding: 30px; 
        box-shadow: 0 8px 25px rgba(0,0,0,0.08); 
        transition: transform 0.3s, box-shadow 0.3s;
        text-align: center;
        border-top: 5px solid #C67C41; 
    }
    .service-card:hover {
        transform: translateY(-8px); 
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    }
    .service-card .icon {
        font-size: 40px;
        color: #C67C41;
        margin-bottom: 15px;
    }
    .service-card h3 {
        margin-top: 10px;
        color: #5A4635;
        font-weight: 600;
    }
    .service-card p {
        font-size: 15px;
        color: #5A4635;
        line-height: 1.6;
    }
    footer {
        text-align: center;
        padding: 30px 20px;
        background: #ffffff;
        color: #5A4635;
        border-top: 1px solid #eee;
        font-size: 14px;
    }

    /* ================= Modal Login Form ================= */
    .modal {
        display: none; 
        position: fixed;
        z-index: 5000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.6);
    }
    .modal-content {
        background-color: #FFF7E6;
        margin: 10% auto;
        padding: 30px;
        border-radius: 15px;
        width: 90%;
        max-width: 400px;
        position: relative;
        box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    }
    .close {
        position: absolute;
        right: 20px;
        top: 15px;
        font-size: 28px;
        font-weight: bold;
        color: #5A4635;
        cursor: pointer;
    }
    .modal-content h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #C67C41;
    }
    .modal-content input[type="email"], 
    .modal-content input[type="password"] {
        width: 100%;
        padding: 12px 15px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 16px;
    }
    .modal-content button {
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 25px;
        background-color: #C67C41;
        color: white;
        font-size: 18px;
        cursor: pointer;
        margin-top: 15px;
    }
    .modal-content button:hover {
        opacity: 0.9;
    }

    @media (max-width: 768px) {
        .hero h1 { font-size: 48px; }
        .hero p { font-size: 18px; }
        .btn { display: block; width: 80%; margin: 10px auto; }
        nav ul { display: none; flex-direction: column; position: absolute; top: 66px; left: 0; width: 100%; background: #ffffff; box-shadow: 0 5px 10px rgba(0,0,0,0.1); padding: 10px 0; }
        nav ul.active { display: flex; }
        nav ul li { text-align: center; width: 100%; padding: 10px 0; }
        nav ul li a { font-size: 18px; }
        .menu-toggle { display: block; }
    }
</style>
</head>
<body>

<nav>
    <div class="container nav-content">
        <h2>Restaurant System</h2>
        <ul id="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Dishes</a></li>
            <li><a href="#">Orders</a></li>
            <li><a href="#">Kitchen</a></li>
        </ul>
        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
    </div>
</nav>

<div class="hero">
    <div class="hero-content">
        <h1>Manage Your Culinary World</h1>
        <p>Streamline your restaurant operations with our intuitive system.</p>

        <div class="btn-box">
            <button class="btn btn1" onclick="openLogin()">System Login</button>
            <a href="#" class="btn btn2">View Demo</a>
        </div>
    </div>
</div>

<div class="container">
    <section class="section-title">
        <h2>System Features</h2>
    </section>
    <section class="services">
        <div class="service-card">
            <div class="icon">🍽️</div>
            <h3>Dish Management</h3>
            <p>Easily add, update, and categorize menu items with custom details and images.</p>
        </div>

        <div class="service-card">
            <div class="icon">📦</div>
            <h3>Real-time Orders</h3>
            <p>Track all incoming customer orders efficiently from placement to delivery.</p>
        </div>

        <div class="service-card">
            <div class="icon">👨‍🍳</div>
            <h3>Kitchen Display</h3>
            <p>A dedicated, clear panel for kitchen staff to view and process orders.</p>
        </div>

        <div class="service-card">
            <div class="icon">📊</div>
            <h3>Performance Analytics</h3>
            <p>Access daily sales reports, popular items, and key business insights.</p>
        </div>
    </section>
</div>

<footer>
    © 2025 Gourmet Dashboard — All Rights Reserved
</footer>

<!-- Modal Login Form -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeLogin()">&times;</span>
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
            <input id="password" type="password" name="password" placeholder="Password" required>

            <div style="margin:10px 0;">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember Me</label>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</div>

<script>
function toggleMenu() {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('active');
}

function openLogin() {
    document.getElementById('loginModal').style.display = 'block';
}

function closeLogin() {
    document.getElementById('loginModal').style.display = 'none';
}

// Close modal when clicking outside of it
window.onclick = function(event) {
    const modal = document.getElementById('loginModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
