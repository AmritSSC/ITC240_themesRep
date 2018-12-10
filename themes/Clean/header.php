<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$config->title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=$config->theme_virtual?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?=$config->theme_virtual?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?=$config->theme_virtual?>css/clean-blog.min.css" rel="stylesheet">
 
    <style>
        /*
          add a bit of color to the current/active page    
        */    
        #mainNav .navbar-nav>li.nav-item>a.active
        {
            color:yellow;   
        }
    </style>     
    <!-- Custom styles for this template -->
    <link href="<?=$config->theme_virtual?>css/business-casual.css" rel="stylesheet">
        <?=$config->loadhead?>  
  </head>
   
  <body>
    
      
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php"><?=$config->pageIntro?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
       <!--   Menu
          <i class="fas fa-bars"></i> -->
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?=bc_links($config->nav1)?>
            <!--
              <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="db_test.php">Database Test</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="DailyGrind.php">Daily</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="questionaire.php">Questions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="customer_list.php">Customer List</a>
            </li>
            -->
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('<?=$config->theme_virtual?>img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1><?=$config->siteName?></h1>
                <span class="subheading"> <h2><?=$config->slogan?><?=$config->sloganIcon?></h2>
                </span>
            </div>
          </div>
        </div>
      </div>

    </header>
 
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <div class="page-heading">
              <h2><?=$config->pageHeader?></h2>
              <span class="subheading"><?=$config->subHeader?></span>
        </div>
            
        <div class="container">
        <div class="bg-faded p-4 my-4">
            <?=showFeedback();?>
      <!-- header ends here -->
            
    
            
    <?php
/*
function to create navigation from 
as associative array

*/
function bc_links($nav1){
    
    global $config;
    $myReturn = '';
    foreach($nav1 as $url => $text){
        
        $url = $config->virtual_path . $url; //add virtual path
        if(THIS_PAGE == $url)
        {//current page - add highlight
              $myReturn .= '
            <li class="nav-item active px-lg-4">
                <a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
            </li>
            '; 
        }else{//no highlight
             $myReturn .= '
            <li class="nav-item px-lg-4">
                <a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
            </li>
            '; 
        }
    }
    
    return $myReturn;

}//end bc_links()
            
?>