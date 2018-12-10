<?php include 'config.php'?>
<?php 
/* 
    if day is passed via GET, show $day's coffee
    
    if today, show $today's coffee
    
    place a link to show today's coffee (if on another day)
*/
    
if(isset($_GET['day']))
{ //if day is passed via GET, show $day's coffee
    $today = $_GET['day'];
    
}
else
{ //if today, show $today's coffee
    $today = date('l');   
}

//$today = date('l');

//echo $today;
//die;
>

<?php include 'header.php'?>

<?php
    include 'A2_DailyGrind.php';
?>


<?php include 'footer.php'?>