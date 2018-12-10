<?php include 'config.php'?>
<?php include 'header.php'?>

<?php
//conditionals.php

/*
    Monday is start the week qoute
    Tuesday is a touch of motivation.
    Wednesday is all about ideas.
    Thursday is to contemplate war and peace.
    Friday is to remind you to live.
    Saturday is about making amends.
    Sunday is for remembering your place.
    
*/

$day = date('l');


switch($day)
{
    
    case 'Monday': 
        // echo '<div style="background-color:violet">';
        $background = 'violet';
        $color = 'darkred';
        $greeting = 'Hello! ';
        $quote = "The secret of getting ahead is getting started. - Mark Twain";        
        $image = 'https://data.whicdn.com/images/5179345/large.jpg'; 
        $alt = 'Day 1 of the week';
    break;

    case 'Tuesday': 
        // echo '<div style="background-color:indigo">';
        $background = 'indigo';
        $color = 'darkorange';
        $greeting = 'Olá! ';
        $quote = "The successful warrior is the average man, with laser-like focus. - Bruce Lee";        
        $image = 'http://www.phaidon.com/resource/newtankmanstuartfranklin.jpg'; 
        $alt = 'Day 2 of the week';
        
    break;
    
    case 'Wednesday':
        //echo '<div style="background-color:blue">';
        $background = 'blue';
        $color = 'Gold';
        $greeting = 'Здравствуйте! ';
        $quote = "Great minds discuss ideas; average minds discuss events; small minds discuss people. - Eleanor Roosevelt";        
        $image = 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Philbar_3.png'; 
        $alt = 'Day 3 of the week';
        
    break;

    case 'Thursday': 
        // echo '<div style="background-color:green">';
        $background = 'green';
        $color = 'darkgreen';
        $greeting = 'سلام! ';
        $quote = "War makes rattling good history; but Peace is poor reading. - Thomas Hardy";        
        $image = 'https://i.pinimg.com/474x/75/93/fd/7593fde379d9ef6ce92ffe8616ce1744--art-memes-character-concept-art.jpg'; 
        $alt = 'Day 4 of the week';
        
    break;
    case 'Friday':
        // echo '<div style="background-color:yellow">';
        $background = 'yellow';
        $color = 'darkblue';
        $greeting = 'Hujambo! ';
        $quote = "He not busy being born is busy dying. - Bob Dylan";        
        $image = 'https://metalitalia.com/wp-content/uploads/2012/11/Children-Of-Bodom-Something-Wild-Album-1997-500x500.jpg'; 
        $alt = 'Day 5 of the week';
        
    break;
    case 'Saturday':
        // echo '<div style="background-color:orange">';
        $background = 'orange';
        $color = 'darkorchid';
        $greeting = 'مرحبا! ';
        $quote = "Always forgive your enemies; nothing annoys them so much. - Oscar Wilde";        
        $image = 'http://purplecentre.com/wp-content/uploads/2017/05/anger.jpg'; 
        $alt = 'Day 6 of the week';
        
    break;
    
    case 'Sunday':
        // echo '<div style="background-color:red">';
        $background = 'red';
        $color = 'darkviolet';
        $greeting = 'नमस्ते! ';
        $quote = "Two things are infinite: the universe and human stupidity; and I'm not sure about the universe. ― Albert Einstein";        
        $image = 'https://nasaviz.gsfc.nasa.gov/vis/a010000/a010900/a010921/potw1205a_1024x576.jpg'; 
        $alt = 'Day 0. Brace yourself.';
        
    break;
}

echo '<div style="background-color:' . $background . '">';
echo nl2br(" $greeting \n Today is $day. \n \n");
$imageData = base64_encode(file_get_contents($image));
echo '<img src="data:image/jpeg;base64,'.$imageData.'" alt="' . $alt . '">';
echo nl2br( "\n\n\n Quote for $day: \n\n           $quote.");
echo '</div>';


?>

<?php include 'footer.php'?>