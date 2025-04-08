<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        /* 🌸 Beautiful Girly Design */
        body {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            color: #fff;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .button {
            background: #fff;
            color: #ff758c;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            display: inline-block;
            margin: 5px;
        }

        .button:hover {
            background: #ff758c;
            color: #fff;
            transform: scale(1.05);
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container {
            animation: fadeIn 1s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="container">
        @if(Auth::check())
            <h1>Welcome, {{ Auth::user()->name }}! 🌸</h1>
            <p>We’re so happy to see you again! Start organizing your tasks now. ✨</p>
            <a href="/tasks" class="button">Go to To-Do List</a>
            <a href="{{ route('logout') }}" class="button"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <h1>Welcome to Your To-Do App! 🎀</h1>
            <p>Stay organized and manage your tasks beautifully! 🌷</p>
            <a href="/login" class="button">Log in</a>
            <a href="/register" class="button">Sign up</a>
        @endif
    </div>
</body>
</html>
