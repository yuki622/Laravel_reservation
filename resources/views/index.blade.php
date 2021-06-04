<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Reservation</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <header>
            <h1 class='headline'>
                <a>YNStudio</a>
            </h1>
            <ul class="nav-list">
                    <li class="nav-list-item">Vacancy search</li>
            </ul>
        </header>
        <div class="list">
            <h2>Studio list</h2>
            @foreach ($studios as $studio)
                    <p><a href="/studios/{{ $studio->id }}">{{ $studio->name }}</a></p>
            @endforeach
        </div>
        
       
        <footer>
            <p>© YNStudio.All Rights Reserved.</p>
        </footer>　
    </body>
</html>
