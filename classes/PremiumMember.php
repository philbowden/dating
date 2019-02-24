<?php
/**
 * Created by PhpStorm.
 * User: philbowden
 * Date: 2/15/19
 * Time: 10:32 PM
 */

class PremiumMember extends Member
{
    private $_tallGuyInterests ;
    private $_shortGirlInterests;

    /**
     * PremiumMember constructor.
     * @param $_tallGuyInterests
     * @param $_shortGirlInterests
     */
    public function __construct($fname, $lname, $age, $gender, $phone)
    {
        parent::__construct($fname,$lname,$age,$gender,$phone);

    }

    /**
     * @return array
     */
    public function getTallGuyInterests()
    {
        return $this->_tallGuyInterests;
    }

    /**
     * @param array $tallGuyInterests
     */
    public function setTallGuyInterests($tallGuyInterests)
    {
        $this->_tallGuyInterests = $tallGuyInterests;
    }

    /**
     * @return array
     */
    public function getShortGirlInterests()
    {
        return $this->_shortGirlInterests;
    }

    /**
     * @param array $shortGirlInterests
     */
    public function setShortGirlInterests($shortGirlInterests)
    {
        $this->_shortGirlInterests = $shortGirlInterests;
    }


}