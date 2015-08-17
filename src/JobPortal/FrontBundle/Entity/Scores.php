<?php

namespace JobPortal\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scores
 */
class Scores
{
    /**
     * @var integer
     */
    private $categoryType;
    
    /**
     * @var integer
     */
    private $userId;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var float
     */
    private $score;

    /**
     * @var float
     */
    private $totalMarks;

    /**
     * @var string
     */
    private $question;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set categoryType
     *
     * @param integer $categoryType
     * @return Scores
     */
    public function setCategoryType($categoryType)
    {
        $this->categoryType = $categoryType;
    
        return $this;
    }

    /**
     * Get categoryType
     *
     * @return integer 
     */
    public function getCategoryType()
    {
        return $this->categoryType;
    }
    
    /**
     * Set userId
     *
     * @param integer $userId
     * @return Scores
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
     * Set date
     *
     * @param \DateTime $date
     * @return Scores
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set score
     *
     * @param float $score
     * @return Scores
     */
    public function setScore($score)
    {
        $this->score = $score;
    
        return $this;
    }

    /**
     * Get score
     *
     * @return float 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set totalMarks
     *
     * @param float $totalMarks
     * @return Scores
     */
    public function setTotalMarks($totalMarks)
    {
        $this->totalMarks = $totalMarks;
    
        return $this;
    }

    /**
     * Get totalMarks
     *
     * @return float 
     */
    public function getTotalMarks()
    {
        return $this->totalMarks;
    }

    /**
     * Set question
     *
     * @param string $question
     * @return Scores
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
