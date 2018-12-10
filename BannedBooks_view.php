<?php
//Banned_view.php - shows details of a single book
?>
<?php include 'includes/config.php';?>

<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:BannedBooks_pager.php');
}


$sql = "select * from BannedBooks where BannedBookID = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $Title = stripslashes($row['Title']);
        $Author = stripslashes($row['Author']);
        $Description = stripslashes($row['Description']);
        $PublicationDate = stripslashes($row['PublicationDate']);
       // $titlepg = "Title Page for " . $Title;
        $pageHeader = $Title;
        $Feedback = '';//no feedback necessary
    }    

}else{//inform there are no records
    $Feedback;
}


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

<h1>Banned Books List</h1>

<?php 

if($Feedback == '')
{//data exists, show it

    echo '<p>';
    echo 'Title: <b>' . $Title . '</b> ';
    echo 'Author: <b>' . $Author . '</b> ';
    echo 'Description: <b>' . $Description . '</b> ';
    echo 'Publication Date: <b>' . $PublicationDate . '</b> ';    
    
    echo '<img src="uploads/bannedBooks/BannedBook' . $id . '.jpg" />';
    
    if(startSession() && isset($_SESSION["AdminID"]))
        {# only admins can see 'peek a boo' link:
           // echo '<p align="center"><a href="' . $config->virtual_path . '/upload_form_bannedBooks.php?' . $_SERVER['QUERY_STRING'] . '">UPLOAD IMAGE</a></p>';
            
            # if you wish to overwrite any of these options on the view page, 
            # you may uncomment this area, and provide different parameters:						
            echo '<div align="center"><a href="' . $config->VIRTUAL_PATH . 'upload_form_bannedBooks.php?' . $_SERVER['QUERY_STRING']; 
            echo '&imagePrefix=BannedBook';
            echo '&uploadFolder=uploads/bannedBooks/';
            echo '&extension=.jpg';
            echo '&createThumb=TRUE';
            echo '&thumbWidth=50';
            echo '&thumbSuffix=_thumb';
            echo '&sizeBytes=500000';
            echo '">UPLOAD IMAGE</a></div>';
            						

        }
    
    
    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="BannedBooks_pager.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>

<?php get_footer();?>