<?php include 'includes/config.php';?>

<?php //include 'header.php';
?> 
<?php get_header();?>
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
?>
<?php include 'header.php'?>

<p><?=$today?>'s Special is Pumpkin Spice</p>  
<p>Click below to find out what awesome flavors we have for each day of the week.</p>
<p><a href="daily.php?day=Sunday">Sunday</a></p>


<?php //include 'footer.php'
?>
<?php get_footer();?>