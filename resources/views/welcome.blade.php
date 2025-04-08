<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body{
                margin: 0;
                font-family: 'Poppins', sans-serif;
                text-align: center;
                background: linear-gradient(135deg, #d66fa8, #faa8bc);
                color: #fff;
                height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 20px;
        }

           .authentic{
            text-align: center;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            width: 600px;
            border-radius: 20px;
            height: 200px;
            padding-top: 170px;
            font-size: 2.0rem;
            font-weight: bold;
            color: #ff758c;
            background: linear-gradient(135deg,#ec55b2, #27e9df);
            animation: flip 2s ease-in-out;
           }

/* Cartoon-like bounce and rotate animation */
@keyframes flip {
    0% {
        transform: rotateY(0deg);
    }
    50% {
        transform: rotateY(180deg); /* Half flip */
    }
    100% {
        transform: rotateY(360deg); /* Full flip */
    }
}
/* Apply to the login and register links */
.authentic a {
    transition: font-size 0.3s ease, transform 0.3s ease; /* Smooth transition for font size and scaling */
    padding: 8px 16px; /* Some padding for better visual appeal */
    border-radius: 4px; /* Optional: Rounded corners */
    font-size: 24px; /* Default font size */
    text-decoration: none;
}

/* Increase font size and zoom effect on hover */
.authentic a:hover {
    font-size: 36px; /* Increases font size by 2px */
    transform: scale(1.05); /* Slight zoom to make the effect more noticeable */
    box-shadow: 0 30px 10px 2px rgba(255, 105, 180, 0.7); /* Pinkish glow */
    text-decoration: none; /* Optional: removes underline */

    /* Webkit-specific styles for customized hover effects in webkit browsers */
    -webkit-transform: scale(1.05); /* Scale effect for webkit browsers */
    -webkit-box-shadow: 0 0 10px 2px rgba(255, 105, 180, 0.7); /* Pinkish glow */
}


/* Welcome Card Styling */
.welcome-card {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color: #f7f7f7;
    text-align: center;
    padding: 20px;
    transition: all 0.6s ease-out; /* Slide effect */
    z-index: 1000; /* Ensure it's on top */
    animation: flip 2s ease-in-out;
}

.welcome-message h1 {
    font-size: 2.5rem;
    color: #333;
}

.welcome-message p {
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 20px;
}

.arrow-button {
    display: inline-block;
    animation: bounce 1.5s infinite;
    cursor: pointer;
    margin-top: 20px;
    transition: transform 0.3s ease;
}

.arrow-button:hover {
    transform: scale(1.2) rotate(10deg);
    filter: drop-shadow(0 0 6px #ffb6c1);
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

        </style>
    </head>
    <body class="antialiased">

        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="welcome-card" id="welcome-card">
                <div class="welcome-message">
                    <h1>Welcome to the todo app!</h1>
                    <p>We're glad to have you here. Please click below to get started with your todoing.</p>
                    <a href="javascript:void(0)" class="arrow-button" onclick="showAuth()" title="Let's go!">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#ff69b4" viewBox="0 0 24 24" width="48" height="48">
                            <path d="M12 2c.6 0 1 .4 1 1v15.6l5.3-5.3c.4-.4 1-.4 1.4 0s.4 1 0 1.4l-7 7c-.4.4-1 .4-1.4 0l-7-7c-.4-.4-.4-1 0-1.4s1-.4 1.4 0L11 18.6V3c0-.6.4-1 1-1z"/>
                        </svg>
                    </a>
                </div>
            </div>

            @if (Route::has('login'))
                <div class="authentic">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="mr-12 text-pink-300 hover:text-pink-400" aria-label="Log in">🌸Log in</a>


                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="mr-12 text-pink-300 hover:text-pink-400">Register🎀</a>
                        @endif
                    @endauth
                </div>
            @endif
                </div>
            </div>
        </div>

        <script>
            function showAuth() {
                // Hide the welcome card by sliding it up
                document.getElementById("welcome-card").style.transform = "translateY(-100%)";

                // Show the authentication section with fade-in effect
                var authSection = document.getElementById("auth");
                authSection.style.display = "flex";
                setTimeout(() => {
                    authSection.style.opacity = "1";
                }, 100);
            }
        </script>

    </body>
</html>
