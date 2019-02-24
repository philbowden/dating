<?php
/**
 * Created by PhpStorm.
 * User: newuser
 * Date: 2/1/2019
 * Time: 10:23 PM
 */

function validName($name)
{
    if(ctype_alpha($name) && $name != "") {
        return true;
    }
    return false;
}

function validAge($age)
{
    if(!is_numeric($age) || $age == "") {
        echo "No dude!";
    }
    elseif($age < 18) {
        echo "You must be at least 18 to sign up for this dating site";
        return false;
    }
    elseif(is_numeric($age) && $age != "" && $age > 17){
        return true;
    }
    return false;
}

function validPhone($phone) //thanks Keith Carlson
{
    //eliminate any char that's not 0-9
    if(strlen($phone) > 10){
        $phone = preg_replace("[^0-9]", "",$phone);
    }
    elseif(strlen($phone) === 10)
    {
        return true;
    } else {
        echo "<p>please provide 10 digit number with area code</p>";
        return false;
    }
}

function validFeet($feet)
{
    if(is_numeric($feet) && $feet != "" && $feet > 3 && $feet < 8) {
        return true;
    }
    return false;
}

function validInches($inches)
{
    if(is_numeric($inches) && $inches != "" && $inches < 12 && $inches >= 0 ) {
        return true;
    }
    return false;
}


function validEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    echo "<p>Please provide a valid email address";
    return false;
}

function validGender($gender)
{
    if($gender != "") {
        return true;
    }
    return false;
}

function validInterest($interest)
{
    $talls = array('Basketball','Light Bulb Installation', 'Sitting In The Front Row',
        'Stocking Shelves','Bumping Head','Street Light Bulb Installation',
        'Back Row For Class Photo','Weather Forecasting');

    $shorts = array('Little Person Wrestling', 'Scrunching Up In Corners',
        'Gymnastics','Making Christmas Toys',  'Horse Jockeying','Little League Soccer',
        'Miniature Golf', 'Loading The Sleigh');
    global $f3;
    return in_array($interest, $talls) || in_array($interest,$shorts);



}