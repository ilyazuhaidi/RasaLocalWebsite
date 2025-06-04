<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RasaLocal - Malaysian Recipe Website</title>
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>
    <header class="header">
        <h1>Rasa<span>Local</span></h1>
        <nav>
            <a href="#about">About Us</a>
            <a href="#contact">Contact</a>
            <a href="#signup" class="btn-signup">Sign Up</a>
        </nav>
    </header>

    <main class="container">
        <section class="login-section">
            <img src="https://images.pexels.com/photos/11912788/pexels-photo-11912788.jpeg" alt="Food Image">
            <div class="login-box">
                <h2>Log In to access your account.</h2>
                <p>New? Sign Up!</p>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Sign In</button>
                </form>
            </div>
        </section>

        <section class="info-section">
            <h2>Rasa<span>Local</span></h2>
            <p>Share recipes, savor traditions</p>

            <h3>Discover Authentic Recipes</h3>
            <p>Dive into a treasure trove of traditional Malaysian recipes. From savory dishes to sweet delights, explore the rich flavors that make our local cuisine unique.</p>

            <h3>Share Your Culinary Journey</h3>
            <p>Join our community of lovers by sharing your own recipes. Connect with fellow enthusiasts and inspire others with your culinary creations!</p>
        </section>
    </main>
</body>
</html>
