<?php
/**
 * Created by PhpStorm.
 * User: Phil Bowden
 * Date: 1/15/2019
 * Time: 10:56 PM
 */
//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);
//require autoload
require_once('vendor/autoload.php');
session_start();
//print_r($_SESSION);
//create instance of the Base class
$f3 = Base::instance();
//turn on fat-free error reporting
$f3->set('DEBUG', 3);
//require validation functions page
require_once('model/validation-functions.php');
//define a default route
$f3->route('GET /', function() {
    $view = new View;
    echo $view->render('views/home.html');
});
//personal.html route
$f3->route('GET|POST /personal', function($f3)
{
    $isValid = true;
    // reset session array
    $_SESSION = array();
    if(!empty($_POST)) {
        //Set Variables
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $feet = $_POST['feet'];$inches = $_POST['inches'];
        $premiumMember = $_POST['premiumMember'];
        //check name
        if(empty($fname)) {
            echo "<p>Please provide first name</p>";
            $isValid = false;
        } elseif (!validName($fname)) {
            echo "<p>You've provided invalid characters first name</p>";
            $isValid = false;
        }
        //check last name
        if(empty($lname)) {
            echo "<p>Please provide last name</p>";
            $isValid = false;
        } elseif (!validName($lname)) {
            $isValid = false;
        }
        //check age
        if(empty($age)) {
            echo "<p>Please provide age</p>";
            $isValid = false;
        } elseif (!validAge($age)) {
            $isValid = false;
        }
        //check phone
        if(empty($phone)) {
            echo "<p>Please provide phone number</p>";
            $isValid = false;
        } elseif (!validPhone($phone)) {
            $isValid = false;
        }
        //check gender
        if(empty($gender)) {
            echo "<p>Please provide your gender</p>";
            $isValid = false;
        } elseif (!validGender($gender)) {
            $isValid = false;
        }
        //check feet
        if(empty($feet)) {
            echo "<p>Please provide number of feet</p>";
            $isValid = false;
        } elseif (!validFeet($feet)) {
            $isValid = false;
        }
        //check inches
        if(empty($inches)) {
            echo "<p>Please provide number of inches</p>";
            $isValid = false;
        } elseif (!validInches($inches)) {
            $isValid = false;
        }
        if(!empty($premiumMember))
        {
            echo "Personal Premium";
            $_SESSION['premiumMember'] = 'premiumMember';
            $_SESSION['current'] = new PremiumMember($fname, $lname, $age, $gender, $phone);
            $current = $_SESSION['current'];
            $current->setFeet($feet);
            $current->setInches($inches);
        }
        else
        {
            echo "Personal Not Premium! ";
            $_SESSION['premiumMember']='non';
            $current = new Member($fname, $lname, $age, $gender, $phone);
            $_SESSION['current'] = $current;
            $current->setFeet($feet);
            $current->setInches($inches);
        }
        //if everything checks out reroute to profile page
        if($isValid) {
            //print_r($current);
            $f3->reroute('profile');
        }
    }
    $template = new Template();
    echo $template->render('views/personal.html');
});
//profile route
$f3->route('GET|POST /profile', function($f3)
{
    $isValid = true;
    if(!empty($_POST)) {
        //assign variables
        $email = $_POST['email'];
        $state = $_POST['state'];
        $sgender = $_POST['sgender'];
        $sfeet = $_POST['sfeet'];
        $sinches = $_POST['sinches'];
        $bio = $_POST['bio'];
        $current = $_SESSION['current'];
        //check email
        if(empty($email)) {
            echo "<p>Please provide an email address</p>";
            $isValid = false;
        } elseif (!validEmail($email)) {
            $isValid = false;
        }else{
            $current->setEmail($email);
        }
        //check state
        if(empty($state)) {
            echo "<p>Please provide a state</p>";
            $isValid = false;
        }else{
            $current->setState($state);
        }
        //check saught gender
        if(empty($sgender)) {
            echo "<p>Please provide the gender you are seeking</p>";
            $isValid = false;
        } elseif (!validGender($sgender)) {
            $isValid = false;
        }else{
            $current->setSeekGender($sgender);
        }
        //check feet seeking
        if(empty($sfeet)) {
            echo "<p>Please provide the preferred number of feet of person you are seeking</p>";
            $isValid = false;
        } elseif (!validFeet($sfeet)) {
            $isValid = false;
        }else{
            $current->setSeekFeet($sfeet);
        }
        //check inches seeking
        if(empty($sinches)) {
            echo "<p>Please provide the preferred number of inches of person you are seeking</p>";
            $isValid = false;
        } elseif (!validInches($sinches)) {
            $isValid = false;
        }else{
            $current->setSeekInches($sinches);
        }
        //check bio
        if(!empty($bio)){
            $current->setBio($bio);
        }else{
            echo "Please enter something in your bio";
            $isValid = false;
        }
        $_SESSION['current'] = $current;
        if($isValid) {
            if($_SESSION['premiumMember']=='premiumMember') {
                echo "Profile Premium";
                $f3->reroute('interests');
            }else{
                $_SESSION['current']=$current;
                //print_r($current);
                //Connect to the database
                $data = new Database();
                $data->connect();

                //insert new member data
                $data->insertMember($current);
                $f3->reroute('summary');
            }
        }
    }
    $template = new Template();
    echo $template->render('views/profile.html');
});
//interest route
$f3->route('GET|POST /interests', function($f3)
{
    $isValid = false;
    $current = $_SESSION['current'];
    if(!empty($_POST)) {
        $isValid = true;
        if(isset($_POST['tallInterests'])) {
            $tallInterests = $_POST['tallInterests'];
            foreach ($tallInterests as $tallInterest) {
                if(!validInterest($tallInterest)) {
                    $isValid = false;
                    echo "please select valid interest";
                }
            }
        }
        if(isset($_POST['shortInterests'])) {
            $shortInterests = $_POST['shortInterests'];
            foreach ($shortInterests as $shortInterest) {
                if(!validInterest($shortInterest)) {
                    $isValid = false;
                    echo "please selected valid interest";
                }
            }
        }
    }
    $_SESSION['current'] = $current;
    if($isValid){
        //set Premium Member array fields
        $current->setTallGuyInterests($_POST['tallInterests']);
        $current->setShortGirlInterests($_POST['shortInterests']);

        //Connect to the database
        $data = new Database();
        $data->connect();

        //insert new member data
        $data->insertMember($current);

        $f3->reroute('summary');
    }
    $template = new Template();
    echo $template->render('views/interests.html');
});
//summary route
$f3->route('GET /summary', function($f3)
{
    if($_SESSION['premiumMember'] == 'premiumMember'){
        $current = $_SESSION['current'];
        $tall = $current->getTallGuyInterests();
        $short = $current->getShortGirlInterests();
        $allInterests = array_merge($tall,$short);
        $current->setInterests($allInterests);
        $interestString = implode(", ",$allInterests);


        $f3->set('interests',$interestString);
    }
    $current = $_SESSION['$current'];

    $template = new Template();
    echo $template->render('views/summary.html');
});

//admin route
$f3->route('GET|POST /admin', function($f3)
{
    $data = new Database();

    $data->connect();

    $allEntries = $data->getMembers();

    $f3->set('Members',$allEntries);

    $template = new Template();
    echo $template->render('views/admin.html');
});

//viewProfiles route
/*$f3->route('GET|POST/viewProfiles/@member_id', function($f3, @params)
{

    $template = new Template();
    echo $template->render('views/admin.html');
});*/

//run fat free
$f3->run();