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
                    <li class="nav-list-item">Login</li>
            </ul>
        </header>
        <div class="studio">
            <h2 class="name">
                {{ $studio->name }}
            </h2>
            <div class="contents">
                <div class="content_studio">
                    <p>{{ $studio->location }}</p>
                    <p>{{ $studio->description }}<p>
                    <p>{{ $studio->tel_num }}</p>
                </div>
                <div class="content_room">
                        <h3>Room type</h3>
                    @foreach ($rooms as $room)
                        <p>[{{ $room->type }}]</p>
                        <p>{{ $room->description }}</p>
                        <p>{{ $room->price }}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="back">
            <a href="/">back</a>
        </div>
        <footer>
            <p>© YNStudio.All Rights Reserved.</p>
        </footer>　
    </body>
</html>
