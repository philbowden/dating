<?php
/**
 * Created by PhpStorm.
 * User: philbowden
 * Date: 2/24/19
 * Time: 5:15 PM
 */
/*
 * CREATE TABLE Members (
    member_id BIGINT(50),
    fname VARCHAR (30),
    lname VARCHAR (30),
    age TINYINT(2),
    gender CHAR(1),
    phone VARCHAR(10),
    email VARCHAR(30),
    state VARCHAR(50),
    seeking CHAR(1),
    bio BLOB(200),
    isPremium CHAR(1),
    image VARCHAR(50),
    interests VARCHAR(200)
    )*/


class Database
{
    function connect()
    {
        //Connect to the database
        require '/home/pbowdeng/config.php';
        try {
            //Instantiate a database object
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD );
            echo 'Connected to database!';
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function insertMember()
    {

        //Define the query
        global $dbh;

        $sql = "INSERT INTO Members( fname, lname, age, gender, phone, email,
                  state, seeking, bio, isPremium, image, interests)
        VALUES (:fname, :lname, :age, :gender, :phone, :email, :state,
                  :seeking, :bio, :isPremium, :image, :interests)";

        //Prepare the statement
        $statement = $dbh->prepare($sql);

        $current = $_SESSION['current'];

        //Bind the parameters
        $fname = $current->getFname();
        $lname = $current->getLname();
        $age = $current->getAge();
        $gender = $current->getGender();
        $phone = $current->getPhone();
        $email = $current->getEmail();
        $state = $current->getState();
        $seekGender = $current->getSeekGender();
        $bio = $current->getBio();
        $isPremium = $current->getAge();
        if($gender == male)
        {
            $interests = $current->getTallGuyInterests();
        } else {
            $interests = $current->getShortGirlInterests();
        }

        $statement->bindParam(':fname', $fname, PDO::PARAM_STR);
        $statement->bindParam(':lname', $lname, PDO::PARAM_STR);
        $statement->bindParam(':age', $age, PDO::PARAM_INT);
        $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':state', $state, PDO::PARAM_STR);
        $statement->bindParam(':seekGender', $seekGender, PDO::PARAM_STR);
        $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
        $statement->bindParam(':isPremium', $isPremium, PDO::PARAM_STR);
        $statement->bindParam(':interests', $interests, PDO::PARAM_STR);


        //Execute
        $statement->execute();
        $success = $statement->execute();
        return $success;
        echo "<p>Member $member_id inserted successfully.</p>";

    }

    function getMembers()
    {
        global $dbh;

        $sql = "SELECT * FROM Member ORDER BY last, first";

        $statement = $dbh->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getMember($member_id)
    {
        global $dbh;

        $sql = "SELECT * FROM Member WHERE  member_id= :member_id";

        $statement = $dbh->prepare($sql);

        $statement->bindParam(':member_id',$member_id,
            PDO::PARAM_STR);

        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
