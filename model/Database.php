<?php
/**
 * Created by PhpStorm.
 * User: philbowden
 * Date: 2/24/19
 * Time: 5:15 PM
 */
/*
 * CREATE TABLE Members (
    member_id int(100),
    fname VARCHAR (30),
    lname VARCHAR (30),
    age TINYINT(2),
    gender VARCHAR(7),
    phone VARCHAR(10),
    email VARCHAR(30),
    state VARCHAR(50),
    seeking VARCHAR(7),
    bio VARCHAR(300),
    isPremium VARCHAR(5),
    image VARCHAR(10),
    interests VARCHAR(200)
    )*/
class Database
{
    function connect()
    {
        //Connect to the database
        require_once '/home/pbowdeng/config.php';
        try {
            global $data;
            //Instantiate a database object
            $data = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD );
            //echo 'YOU ARE Definitely Connected!';
            //echo 'You Are Connected!';

            return $data;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function insertMember(Member $current)
    {
        $data = $this->connect();
        $fname = $current->getFname();
        $lname = $current->getLname();
        $age = $current->getAge();
        $gender = $current->getGender();
        $phone = $current->getPhone();
        $email = $current->getEmail();
        $state = $current->getState();
        $seeking = $current->getSeekGender();
        $bio = $current->getBio();
        $image = "none";
        if(get_class($current) == 'PremiumMember'){
            $isPremium = "yes";
            $tall = $current->getTallGuyInterests();
            $short = $current->getShortGirlInterests();
            $allInterests = array_merge($tall,$short);
            $interests = implode(", ",$allInterests);
        }else{
            $isPremium = "no";
            $interests = "NA";
        }
        $sql = "INSERT INTO Members (fname, lname, age, gender, phone,
                email, state, seeking, bio, isPremium, image, interests)
                VALUES (:fname, :lname, :age, :gender, :phone,
                :email, :state, :seeking, :bio, :isPremium, :image, :interests)";
        $statement = $data->prepare($sql);
        $statement->bindParam(':fname',$fname, PDO::PARAM_STR);
        $statement->bindParam(':lname',$lname, PDO::PARAM_STR);
        $statement->bindParam(':age',$age, PDO::PARAM_STR);
        $statement->bindParam(':gender',$gender, PDO::PARAM_STR);
        $statement->bindParam(':phone',$phone, PDO::PARAM_STR);
        $statement->bindParam(':email',$email, PDO::PARAM_STR);
        $statement->bindParam(':state',$state, PDO::PARAM_STR);
        $statement->bindParam(':seeking',$seeking, PDO::PARAM_STR);
        $statement->bindParam(':bio',$bio, PDO::PARAM_STR);
        $statement->bindParam(':isPremium',$isPremium, PDO::PARAM_INT);
        $statement->bindParam(':image',$image, PDO::PARAM_STR);
        $statement->bindParam(':interests',$interests, PDO::PARAM_STR);
        // Execute the statement
        $success = $statement->execute();
        return $success;
    }
    function getMembers()
    {
        $data = $this->connect();
        $sql = "SELECT * FROM Members ORDER BY lname";
        $statement = $data->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function getMember($member_id)
    {
        $data = $this->connect();
        $sql = "SELECT * FROM Members WHERE member_id = :member_id";
        $statement = $data->prepare($sql);
        $statement->bindParam(':member_id',$member_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}