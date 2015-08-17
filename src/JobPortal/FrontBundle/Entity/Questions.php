<?php

namespace JobPortal\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questions
 */
class Questions
{
    /**
     * @var string
     */
    private $question;

    /**
     * @var integer
     */
    private $standardType;

    /**
     * @var float
     */
    private $marksPositive;

    /**
     * @var float
     */
    private $marksNegative;

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
     * @var \JobPortal\FrontBundle\Entity\Categories
     */
    private $category;


    /**
     * Set question
     *
     * @param string $question
     * @return Questions
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    
        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set standardType
     *
     * @param integer $standardType
     * @return Questions
     */
    public function setStandardType($standardType)
    {
        $this->standardType = $standardType;
    
        return $this;
    }

    /**
     * Get standardType
     *
     * @return integer 
     */
    public function getStandardType()
    {
        return $this->standardType;
    }

    /**
     * Set marksPositive
     *
     * @param float $marksPositive
     * @return Questions
     */
    public function setMarksPositive($marksPositive)
    {
        $this->marksPositive = $marksPositive;
    
        return $this;
    }

    /**
     * Get marksPositive
     *
     * @return float 
     */
    public function getMarksPositive()
    {
        return $this->marksPositive;
    }

    /**
     * Set marksNegative
     *
     * @param float $marksNegative
     * @return Questions
     */
    public function setMarksNegative($marksNegative)
    {
        $this->marksNegative = $marksNegative;
    
        return $this;
    }

    /**
     * Get marksNegative
     *
     * @return float 
     */
    public function getMarksNegative()
    {
        return $this->marksNegative;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Questions
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
     * @return Questions
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

    /**
     * Set category
     *
     * @param \JobPortal\FrontBundle\Entity\Categories $category
     * @return Questions
     */
    public function setCategory(\JobPortal\FrontBundle\Entity\Categories $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \JobPortal\FrontBundle\Entity\Categories 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
