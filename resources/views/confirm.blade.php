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
                <a>YNmusic</a>
            </h1>
        </header>
        <form method="POST" action="{{ route('reservation.send') }}">
            @csrf
            <div class="name">
                <h2>お名前</h2>
                {{ $input["name"] }}
            </div>
            <div class="tel">
                <h2>電話番号</h2>
                {{ $input["tel"] }}
            </div>
            <div class="Number of people">
                <h2>人数</h2>
                {{ $input["num"] }}
            </div>
            <div class="date">
                <h2>日時</h2>
                {{ $input["datetime"] }}
                
            </div>
            <div class="submit">
            <input type="submit" name="btn_back" value="back"/>
            <input type="submit" name="btn_finish" value="send"/>
            </div>   
            
        <footer>
            <p>© YNStudio.All Rights Reserved.</p>
        </footer>　
    </body>
</html>
