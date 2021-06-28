<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/style.css">
        <title>Reservation</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class='headline'>
                <h1>YNmusic</h1>
            </div>
            <div class="centense">
                <p>Music lovers get together!!!</p>
            </div>       
            
        </header>
        <div class="list">
            <h2>Studio list</h2>
            @foreach ($studios as $studio)
                    <p><a href="/studios/{{ $studio->id }}">・{{ $studio->name }}</a></p>
            @endforeach
        </div>
        
    </body>
</html>
