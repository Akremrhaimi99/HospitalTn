<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        /* Global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%; /* Ensure the full height is used */
        }

        body {
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            text-align: var(--bs-body-text-align);
            background-color: var(--bs-body-bg);
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            display: flex;
            flex-direction: column;
        }

        /* Header styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px;
            background-color: #4CAF50;
            color: white;
        }

        header h1 {
            margin: 0;
        }

        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px; /* Larger buttons */
            font-size: 1.1rem; /* Larger text */
            border-radius: 5px;
        }

        nav a:hover {
            text-decoration: underline;
            background-color: #45a049; /* Slightly darker green on hover */
        }

        /* Masthead section (Welcome text) */
        header.masthead {
            display: flex; /* Flexbox */
            justify-content: center; /* Horizontal centering */
            align-items: center; /* Vertical centering */
            height: 100vh; /* Take full height of the viewport */
            padding-top: 10rem; /* Adjust to move text further up */
            text-align: center;
            color: #fff;
            background-color: #4CAF50; /* You can change this to an image or another color */
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center center;
            background-size: cover;
        }

        header.masthead .masthead-subheading {
            font-size: 1.5rem;
            font-style: italic;
            line-height: 1.5rem;
            margin-bottom: 25px;
            font-family: "Roboto Slab", sans-serif;
        }

        header.masthead .masthead-heading {
            font-size: 3.25rem;
            font-weight: 700;
            line-height: 3.25rem;
            margin-bottom: 19rem;
            font-family: "Montserrat", sans-serif;
        }

        /* About section */
        #about {
            display: flex; /* Flexbox */
            justify-content: center; /* Horizontal centering */
            align-items: center; /* Vertical centering */
            height: 50vh; /* Adjust height */
            padding: 299px;
            background-color: #ccffcc; /* Light green background */
            text-align: center;
            font-size: 1.2rem;
            margin-top: 0; /* Remove top margin */
        }

        #about h2 {
            font-size: 2.5rem; /* Larger title */
            margin-bottom: 20px;
            font-family: "Montserrat", sans-serif;
        }

        #about p {
            font-size: 1.5rem; /* Larger text for paragraph */
            max-width: 800px; /* Limit width for better readability */
            margin: 0 auto; /* Center the text */
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Header with Hospital, Home, About, Register and Login buttons -->
    <header>
        <h1>Hospital</h1>
        <nav>
            <a href="#" id="home-btn">Home</a>
            <a href="#about" id="about-btn">About</a>
            <a href="/register" id="register-btn">Register</a>
            <a href="/login" id="login-btn">Login</a>
        </nav>
    </header>

    <!-- Main content -->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Hospital!</div>
            <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
        </div>
    </header>

    <!-- About section -->
    <section id="about" style="background-color: #ccffcc">
        <div>
            <h2>About Us</h2>
            <p>Je me présente : Akrem Rhaimi, étudiant en 2ème année cycle ingénieur à iTeam University. Ce projet est pour la validation de la matière framework PHP (Laravel).</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Akrem Rhaimi Hospital </p>
    </footer>

    <script>
        // Ensure that the Home and Hospital buttons don't reload the page
        document.getElementById('home-btn').addEventListener('click', function(event) {
            event.preventDefault();
            window.location.hash = ''; // Scroll to the top
        });

        document.getElementById('about-btn').addEventListener('click', function(event) {
            event.preventDefault();
            window.location.hash = 'about'; // Scroll to the About section
        });
    </script>
</body>
</html>
