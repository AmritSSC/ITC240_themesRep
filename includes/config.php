<?php
/*
config.php

stores configuration information for our web application

*/

//removes header already sent errors
ob_start();

define('SECURE',false); #force secure, https, for all site pages

define('PREFIX', 'widgets_fl18_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

define('DEBUG',true); #we want to see all errors

include 'credentials.php';//stores database info
include 'common.php';//stores favorite functions

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//create config object
$config = new stdClass;

//CHANGE TO MATCH YOUR PAGES
$config->nav1['template.php'] = "Template";
$config->nav1['index.php'] = 'Home';
$config->nav1['db_test.php'] = 'DB Test';
$config->nav1['DailyGrind.php'] = 'Daily';
$config->nav1['questionaire.php'] = 'Questionaire';
$config->nav1['contact.php'] = 'Contact';
$config->nav1['customer_view.php'] = 'Customers';
$config->nav1['BannedBooks_pager.php'] = 'Banned Books List';

//create default page identifier
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF - be sure to add trailing slash!
$sub_folder = 'widgets/';//change to 'widgets' or 'sprockets' etc.
$config->theme = 'Brick';//sub folder to themes

//will add sub-folder if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
//force secure website
if (SECURE && $_SERVER['SERVER_PORT'] != 443) {#force HTTPS
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}else{
    //adjust protocol
    $protocol = (SECURE==true ? 'https://' : 'http://'); // returns true
    
}
$config->virtual_path = $protocol . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;

define('ADMIN_PATH', $config->virtual_path . 'admin/'); # Could change to sub folder
define('INCLUDE_PATH', $config->physical_path . 'includes/');


//CHANGE ITEMS BELOW TO MATCH YOUR SHORT TAGS
$config->title = THIS_PAGE;
$config->banner = 'Widgets';
$config->loadhead = '';//place items in <head> element

//////////////////////////////////////////////////////////   Added //////////////////////////////////
$config->pageIntro = 'Amateur Blog';
$config->siteName = 'Site Name';
$config->slogan = 'Whatever it is you do, we do it better.';
$config->pageHeader = 'The developer forgot to put a pageheader';
$config->subHeader = 'The developer forgot to put a subheader';
$config->sloganIcon = '';// will be replaced in contact.php by hero icons.

//////////////////////////////////////////////////////////   End Added //////////////////////////////////

/*
switch(THIS_PAGE){
        
    case 'contact.php':    
        $config->title = 'Contact Page';    
    break;
    
    case 'appointment.php':    
        $config->title = 'Appointment Page';
        $config->banner = 'Widget Appointments!';
    break;
        
   case 'template.php':    
        $config->title = 'Template Page';    
    break;   
}
*/


switch(THIS_PAGE)
{
    case 'template.php': 
        $config->title = 'My Template Page';
        $config->pageHeader = 'Put pageID here';
        $config->subHeader = 'Put more info about page here';
        break;
    
    case 'customer_view.php': 
        $config->siteName = 'Our Celebrity Customers';
        $config->slogan = 'We are endorsed by these celebrities';
        $config->title = 'Customer List';
        $config->pageHeader = 'Just a customer List';
        $config->subHeader = 'Here is out celebrity list!';
        break;
    
    case 'questionaire.php': 
        $config->siteName = 'Some Questions';
        $config->slogan = 'Care if do engage in some data collection?';
        $config->title = 'Got some questions for you';
        $config->pageHeader = 'We want to know your thoughts';
        $config->subHeader = 'Please answer the following questions: ';
        //$config->sloganIcon = randomize($heros);
        break;
        
        
    case 'db_test.php': 
        $config->title = 'A Database Test Page';
        $config->pageHeader = 'Database Test Page';
        $config->subHeader = 'Check this page to see if your db credentials are correct.';
        break;
        
    case 'DailyGrind.php': 
        $config->siteName = 'Quote for This Day of the Week';
        $config->slogan = 'A little change, a little consistency';
        $config->title = 'My Daily Page';
        $config->pageHeader = 'Get on with IT already.';
        $config->subHeader = 'Do you know how to write hello in foreign letters?';
        break;
        
    case 'contact.php': 
        $config->title = 'My Contact Page';
        $config->pageHeader = 'Please contact us';
        $config->subHeader = 'We appreciate your feedback';
        //$config->sloganIcon = randomize($heros);
        break;     
    
    case 'BannedBooks.php': 
        $siteName = 'For the rebellious reading type.';
        $slogan = 'I will read what I want';
        $title = 'Banned Books List';
        $pageHeader = 'The only sin worth indulging in';
        $subHeader = 'What will you know tomorrow?';
        break;     
        
   default:
        $config->siteName = 'Clean Blog';
        $config->slogan = 'A Blog Theme by Start Bootstrap';
        $config->pageHeader = '';
        $config->subHeader = '';
        break;        
}

//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . 'themes/' . $config->theme . '/';

/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav
    
    $config->adminWidget = '
        <a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a> 
        <a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a>
    ';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)
    
    $config->adminWidget = '
        <a  href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a>
    ';
}
?>