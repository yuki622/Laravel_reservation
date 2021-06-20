<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model 
{
    function calendar($dt)
    {
        try{
               $dbh = new PDO("mysql:host=localhost;dbname=yuki622","root","root");
           }catch(PDOException $e){
               var_dump($e->getMessage());
               exit;
            }
            
        $daysInMonth = $dt->daysInMonth;

        for ($i = 1; $i <= $daysInMonth; $i++) {

           $reserve_date = $dt->year."-".$dt->month."-".$dt->day; //日付を取得
           $stmt = $dbh->prepare("SELECT * FROM reservations where datetime = :datetime");
           $stmt->bindParam(":reserve_date",$reserve_date);
           $stmt->execute();
           $count = $stmt->rowCount(); //予約件数を取得    
            
       }
            
            if($comp->lt($comp_now)){
           $calendar .= '<td class="day" style="background-color:#ddd;">'.$dt->day.'</td>';
           $calendar .= '<td class="day" style="background-color:#ddd;">'.$dt->day;
        }else{
            if ($comp->eq($comp_now)) {
               $calendar .= '<td class="day" style="background-color:#008b8b;"><a href="./reservation.php?y='.$dt->year.'&&m='.$dt->month.'&&d='.$dt->day.'">'.$dt->day.'</a></td>';
               $calendar .= '<td class="day" style="background-color:#008b8b;"><a href="./reservation.php?y='.$dt->year.'&&m='.$dt->month.'&&d='.$dt->day.'">'.$dt->day.'</a>';
            }else{
                // $calendar .= '<td class="day">'.$dt->day.'</td>';
                switch ($dt->format('N')) {
                    case 6:
                       $calendar .= '<td class="day" style="background-color:#b0e0e6"><a href="./reservaton.php?y='.$dt->year.'&&m='.$dt->month.'&&d='.$dt->day.'">'.$dt->day.'</a></td>';
+                       $calendar .= '<td class="day" style="background-color:#b0e0e6"><a href="./reservation.php?y='.$dt->year.'&&m='.$dt->month.'&&d='.$dt->day.'">'.$dt->day.'</a>';
                        break;
                    case 7:
-                       $calendar .= '<td class="day" style="background-color:#f08080"><a href="./reservation.php?y='.$dt->year.'&&m='.$dt->month.'&&d='.$dt->day.'">'.$dt->day.'</a></td>';
+                       $calendar .= '<td class="day" style="background-color:#f08080"><a href="./reservation.php?y='.$dt->year.'&&m='.$dt->month.'&&d='.$dt->day.'">'.$dt->day.'</a>';
                        break;
                    default:
-                       $calendar .= '<td class="day" ><a href="./reservaton.php?y='.$dt->year.'&&m='.$dt->month.'&&d='.$dt->day.'">'.$dt->day.'</a></td>';
+                       $calendar .= '<td class="day" ><a href="./reservation.php?y='.$dt->year.'&&m='.$dt->month.'&&d='.$dt->day.'">'.$dt->day.'</a>';
                        break;
                }
            }
        }
        if($count != 0){
+           $reservations= $stmt->fetchAll(PDO::FETCH_ASSOC);
            }foreach($reservations as $reservation)
+           {
+               $calendar .= '<br>予約あり</a>';
+           }
+           $calendar .= '</td>';
+       }else{
            $calendar .='</td>';
+       }
        $dt->addDay();
}