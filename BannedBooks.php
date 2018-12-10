<?php include 'includes/config.php'?>

<?php //include 'header.php'?>


<?php 
    
//for this page we'll request no caching to see the latest image
if(isset($_SESSION["AdminID"]))
{//don't cache uploaded images
    $config->loadhead .='
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
    ';
    
}

get_header();
?>

<?php
    
$sql = "select * from BannedBooks";

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
    while ($row = mysqli_fetch_assoc($result))
    {
       echo "<p>";
       echo "Title: <b>" . $row['Title'] . "</b><br />";
       echo "Author: <b>" . $row['Author'] . "</b><br />";
       echo "Description: <b>" . $row['Description'] . "</b><br />";
       echo "Publication Date: <b>" . $row['PublicationDate'] . "</b><br />";
       // echo "</p>";
    
        echo '<a href="BannedBooks_view.php?id=' . $row['BannedBookID'] . '">';
        
        echo '<img src="' . $config->virtual_path . 'uploads/bannedBooks/BannedBook' . dbOut($row['BannedBookID']) . '_thumb.jpg" /></a>';
        
        echo '</p>';
    
    }
}else{//no records
    echo $Feedback;
}

@mysqli_free_result($result); #releases web server memory
@mysqli_close($iConn); #close connection to database

?>


<?php get_footer();?>