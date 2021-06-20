<?php
    session_start();
      $user_login = isset($_SESSION['user_login'])? $_SESSION['user_login']:false;
    //require 'vendor/authload.php';
    use Carbon\Carbon;

     $m = isset($_GET['m'])? htmlspecialchars($_GET['m'], ENT_QUOTES, 'utf-8') : '';
     $y = isset($_GET['y'])? htmlspecialchars($_GET['y'], ENT_QUOTES, 'utf-8') : '';
        if($m!=''||$y!=''){
            $dt = Carbon::createFromDate($y,$m,01);
        }else{
            $dt = Carbon::createFromDate();
   }
      //renderCalendar($dt);
      
      function renderCalendar($dt)
      {
        //DB接続
       try{
          $dbh = new PDO("mysql:host=localhost;dbname=reservation","dbuser","dros0622");
       }catch(PDOException $e){
          var_dump($e->getMessage());
          exit;
       }
        $dt->startOfMonth(); //今月の最初の日
          $dt->timezone = 'Asia/Tokyo'; //日本時刻で表示
          
          //１ヶ月前
       $sub = Carbon::createFromDate($dt->year,$dt->month,$dt->day);
       $subMonth = $sub->subMonth();
       $subY = $subMonth->year;
       $subM = $subMonth->month;
       
            //1ヶ月後
       $add = Carbon::createFromDate($dt->year,$dt->month,$dt->day);
       $addMonth = $add->addMonth();
       $addY = $addMonth->year;
       $addM = $addMonth->month;
       
       //今月
       $today = Carbon::createFromDate();
       $todayY = $today->year;
       $todayM = $today->month;

       //リンク
       $title = '<h4>'.$dt->format('F Y').'</h4>';//月と年を表示
       $title .= '<div class="month"><caption><a class="left" href="./calendar?y='.$todayY.'&&m='.$todayM.'">今月　</a>';
       $title .= '<a class="left" href="./calendar?y='.$subY.'&&m='.$subM.'"><<前月 </a>';//前月のリンク
       $title .= '<a class="right" href="./calendar?y='.$addY.'&&m='.$addM.'"> 来月>></a></caption></div>';//来月リンク
          
          //曜日の配列作成
          $headings = ['月','火','水','木','金','土','日'];
   
      //$calendar = '<table class="table" border=1>';
      $calendar = '<table class="calendar-table">';
      $calendar .= '<thead >';
      foreach($headings as $heading){
          $calendar .= '<th class="header">'.$heading.'</th>';
      }
      $calendar .= '</thead>';
      
      $calendar .= '<tbody><tr>';


   //今月は何日まであるか
    $daysInMonth = $dt->daysInMonth;
   
    for ($i = 1; $i <= $daysInMonth; $i++) {
        
        $datetime = $dt->year."-".$dt->month."-".$dt->day; //日付を取得
        $stmt = $dbh->prepare("SELECT * FROM REGISTRY where id = ?");
        $stmt->execute([$_GET['id']]);
        //$stmt = $dbh->prepare("SELECT * FROM sessions where name = :name");
        //$stmt->bindParam("name",name);
        //$stmt->execute();
        $count = $stmt->rowCount(); //予約件数を取得
        
        if($i==1){
                if ($dt->format('N')!= 1) {
                    $calendar .= '<td colspan="'.($dt->format('N')-1).'"></td>'; //1日が月曜じゃない場合はcospanでその分あける
                }
            }
            
        if($dt->format('N') == 1){
           $calendar .= '</tr><tr>'; //月曜日だったら改行
       }
       
        $comp = new Carbon($dt->year."-".$dt->month."-".$dt->day); //ループで表示している日
        $comp_now = Carbon::today(); //今日

        //ループの日と今日を比較
        if ($comp->eq($comp_now)) {
            //同じなので緑色の背景にする
            $calendar .= '<td class="day" style="background-color:#ff0000;">'.$dt->day;
        }else{
            switch ($dt->format('N')) {
                case 6:
                    $calendar .= '<td class="day" style="background-color:#afeeee">'.$dt->day;
                    break;
                case 7:
                    $calendar .= '<td class="day" style="background-color:#ffa07a">'.$dt->day;
                    break;
                default:
                    $calendar .= '<td class="day" >'.$dt->day.'</td>';
                    break;
     }
 } 
        if($count != 0){
            $sessions= $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($sessions as $id)
            {
                $calendar .= '<br>予約あり</a>';
            }
            $calendar .= '</td>';
        }else{
        $calendar .= '</td>';
        }
        $dt->addDay();
   }

    $calendar .= '</tr></tbody>';

        $calendar .= '</table>';
   
        //echo $title.$calendar;
        return $title.$calendar;
      }
    
    
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>予約状況</title>
    <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    
</head>
<body>
    <head>
        <h1>YNMusic</h1>
    </head>
    <div class="container">
        <div class="wrapper-title">
            <h2>ご予約状況</h2>
        </div>
        <?php echo renderCalendar($dt); ?>
            
    </div>
    <div class="back">
            <a href="/studio">back</a>
        </div>
</body>
</html>