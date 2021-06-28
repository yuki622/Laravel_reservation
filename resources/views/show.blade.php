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
            <div class="headline">
               <h1>YNmusic</h1> 
            </div> 
        </header>
        <div class="studio">
            <div class="name">
                <h2>Studio : {{ $studio->name }}</h2>
            </div>
            <div class="contents">
                <div class="content_studio">
                    <p>location:  {{ $studio->location }}</p>
                    <p>description:  {{ $studio->description }}<p>
                    <p>phone number:  {{ $studio->tel_num }}</p>
                </div>
                <div class="content_room">
                        <h3>*Room type*</h3>
                    @foreach ($rooms as $room)
                        <p>type: [{{ $room->type }}]   <font color="red"><a href="/reservation/{{ $room->id }}">reservation</a></font></p>
                        <p>description:  {{ $room->description }}</p>
                        <p>price:  {{ $room->price }}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="back">
            <a href="/studio">back</a>
        </div>
        
    </body>
</html>
