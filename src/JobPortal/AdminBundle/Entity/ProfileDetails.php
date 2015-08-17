<?php

namespace JobPortal\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProfileDetails
 */
class ProfileDetails
{
    /**
     * @var integer
     */
    private $userId;

    /**
     * @var string
     */
    private $yourStateOfMind;

    /**
     * @var string
     */
    private $cvInPdf;

    /**
     * @var string
     */
    private $lookingFor;

    /**
     * @var string
     */
    private $createdDate;

    /**
     * @var boolean
     */
    private $status;

    /**
     * @var boolean
     */
    private $isDeleted;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set userId
     *
     * @param integer $userId
     * @return ProfileDetails
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set yourStateOfMind
     *
     * @param string $yourStateOfMind
     * @return ProfileDetails
     */
    public function setYourStateOfMind($yourStateOfMind)
    {
        $this->yourStateOfMind = $yourStateOfMind;
    
        return $this;
    }

    /**
     * Get yourStateOfMind
     *
     * @return string 
     */
    public function getYourStateOfMind()
    {
        return $this->yourStateOfMind;
    }

    /**
     * Set cvInPdf
     *
     * @param string $cvInPdf
     * @return ProfileDetails
     */
    public function setCvInPdf($cvInPdf)
    {
        $this->cvInPdf = $cvInPdf;
    
        return $this;
    }

    /**
     * Get cvInPdf
     *
     * @return string 
     */
    public function getCvInPdf()
    {
        return $this->cvInPdf;
    }

    /**
     * Set lookingFor
     *
     * @param string $lookingFor
     * @return ProfileDetails
     */
    public function setLookingFor($lookingFor)
    {
        $this->lookingFor = $lookingFor;
    
        return $this;
    }

    /**
     * Get lookingFor
     *
     * @return string 
     */
    public function getLookingFor()
    {
        return $this->lookingFor;
    }

    /**
     * Set createdDate
     *
     * @param string $createdDate
     * @return ProfileDetails
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    
        return $this;
    }

    /**
     * Get createdDate
     *
     * @return string 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return ProfileDetails
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     * @return ProfileDetails
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    
        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean 
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
