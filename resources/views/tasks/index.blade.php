<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do + Naptár</title>

    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.11/main.min.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.11/main.min.css' rel='stylesheet' />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="page">
    <aside class="sidebar">
        <div class="logo">
            <img src="{{ asset('logo.jpg') }}" alt="Logo" class="logo-img">
        </div>
        <!-- Gomb a kövi oldalra -->
        <a href="{{ route('secondary') }}" class="nav-btn">Dokumentáció (félkész)</a>
    </aside>

    <main class="content">
        <div class="main-container">
            <div class="calendar-col">
                <div id="calendar" class="calendar-section"></div>
            </div>

            <div class="todo-container">
                <h1>To-Do Lista</h1>

                <form action="{{ route('tasks.store') }}" method="POST" class="add-task">
                    @csrf
                    <input type="text" name="title" placeholder="Feladat címe" required>
                    <textarea name="description" placeholder="Rövid leírás (nem kötelező)"></textarea>
                    <input type="date" name="due_date">
                    <button type="submit">Feladat hozzáadása</button>
                </form>

                <ul id="task-list">
                    @foreach ($tasks as $task)
                        <li class="task-item" data-id="{{ $task->id }}">
                            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                @method('PUT')
                                <input type="hidden" name="is_done" value="0">
                                <input type="checkbox" name="is_done" value="1" onchange="this.form.submit()"{{ $task->is_done ? 'checked' : '' }}>
                            </form>

                            <div class="task-text">
                                <h2 class="{{ $task->is_done ? 'done' : '' }}">{{ $task->title }}</h2>
                                @if($task->description)
                                    <p>{{ $task->description }}</p>
                                @endif
                                @if($task->due_date)
                                    <p>📅 Határidő: {{ \Carbon\Carbon::parse($task->due_date)->format('Y. m. d.') }}</p>
                                @endif
                            </div>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: #dc2626; color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">
                                    Delete
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
</div>

@vite(['resources/js/app.js'])
</body>
</html>
