<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To-Do List</title>

    <!-- ✅ Fixed Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* 🌸 Girly & Aesthetic Design */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,rgb(243, 115, 132), #fad0c4);
            color: #fff;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 500px;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
        }

        .task-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            border-radius: 30px;
            border: none;
            text-align: center;
            font-size: 1rem;
            width: 100%;
        }

        .button {
            background: transparent;
            color: #ff758c;
            padding: 8px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            border: none;
        }

        .button:hover {
            transform: scale(1.1);
        }

        .task-list {
            list-style: none;
            padding: 0;
        }

        .task {
            background: rgba(255, 255, 255, 0.8);
            color: #ff758c;
            padding: 12px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 10px 0;
            font-weight: bold;
        }

        .completed {
            text-decoration: line-through;
            color: #888;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        /* Icon Button Styling */
        .actions button, .actions a {
            font-size: 1.5rem;
            color: #ff758c;
            background: transparent;
            border: none;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        .actions button:hover, .actions a:hover {
            color: #d63384;
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🌸 My To-Do List 🎀</h1>

        <form action="/tasks" method="POST" class="task-form">
            @csrf
            <input type="text" name="title" placeholder="Add a new task..." required>
            <input type="text" name="description" placeholder="Add a brief description...">
            <button type="submit" class="button"><i class="fa-solid fa-plus-circle"></i></button>
        </form>

        @if($tasks->count() > 0)
            <ul class="task-list">
                @foreach($tasks as $task)
                    <li class="task">
                        <!-- Task title at the beginning -->
                        <span class="{{ $task->completed ? 'completed' : '' }}">{{ $task->title }}</span>

                        <div class="actions">
                            <form action="/tasks/{{ $task->id }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit">
                                    <i class="{{ $task->completed ? 'fa-solid fa-rotate-left' : 'fa-solid fa-check-circle' }}"></i>
                                </button>
                            </form>

                            <a href="/tasks/{{ $task->id }}/edit">
                                <i class="fa-solid fa-edit"></i>
                            </a>

                            <form action="/tasks/{{ $task->id }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No tasks yet. Start by adding one above! ✨</p>
        @endif
        <a href="/dashboard" class="button">Go Back to Dashboard</a>
    </div>
</body>
</html>
