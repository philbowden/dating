<?php
/**
 * Created by PhpStorm.
 * User: philbowden
 * Date: 2/15/19
 * Time: 10:16 PM
 */

class Member
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_feet;
    private $_inches;
    private $_email;
    private $_state;
    private $_seekGender;
    private $_seekFeet;
    private $_seekInches;

    /**
     * Member constructor.
     * @param $_fname
     * @param $_lname
     * @param $_age
     * @param $_gender
     * @param $_phone
     */
    public function __construct($fname, $lname, $age, $gender, $phone)
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
    }


    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getFeet()
    {
        return $this->_feet;
    }

    /**
     * @param mixed $feet
     */
    public function setFeet($feet)
    {
        $this->_feet = $feet;
    }

    /**
     * @return mixed
     */
    public function getInches()
    {
        return $this->_inches;
    }

    /**
     * @param mixed $inches
     */
    public function setInches($inches)
    {
        $this->_inches = $inches;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return mixed
     */
    public function getSeekGender()
    {
        return $this->_seekGender;
    }

    /**
     * @param mixed $seekGender
     */
    public function setSeekGender($seekGender)
    {
        $this->_seekGender = $seekGender;
    }

    /**
     * @return mixed
     */
    public function getSeekFeet()
    {
        return $this->_seekFeet;
    }

    /**
     * @param mixed $seekFeet
     */
    public function setSeekFeet($seekFeet)
    {
        $this->_seekFeet = $seekFeet;
    }

    /**
     * @return mixed
     */
    public function getSeekInches()
    {
        return $this->_seekInches;
    }

    /**
     * @param mixed $seekInches
     */
    public function setSeekInches($seekInches)
    {
        $this->_seekInches = $seekInches;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }
    private $_bio;

    function toString()
    {
        return $this->_lname . ", " . $this->_fname.", ".$this->_age.", ".$this->_gender.", ".
            $this->_phone.", ".$this->_feet.", ".$this->_inches.", ".$this->_email.", ".$this._state.", ".
            $this->_seekGender.", ".$this->_seekFeet.", ".$this->_seekFeet;
    }



}