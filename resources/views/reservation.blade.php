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
        <form action="{{ route('reservation.post') }}" method="POST">
            @csrf
            <div class="name">
                <h2>お名前</h2>
                <input type="text" name="name" placeholder="name" value="{{ old('name') }}" />
                @error('name')
                    <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
                @enderror 
            </div>
            <div class="tel">
                <h2>電話番号</h2>
                <input type="tel" name="tel" placeholder="11122223333" value="{{ old('tel') }}" />
                @error('tel')
                    <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="Number of people">
                <h2>人数</h2>
                <input type="member" name="num" placeholder="3" value="{{ old('num') }}" />
                @error('num')
                    <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="datetime">
                <h2>日時</h2>
                <input type="datetime-local" name="datetime" list="daylist" min="" value="{{ old('datetime') }}"/>
                @error('datetime')
                    <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" name="room_id" value="{{ $room_id }}"/>
            <div class="submit">
                <a href="/reservation/confirm"><input type="submit" name="btn_confirm" value="Confirm"/></a>
            </div>
        </form>
        
        <footer>
            <p>© YNStudio.All Rights Reserved.</p>
        </footer>　
    </body>
</html>
