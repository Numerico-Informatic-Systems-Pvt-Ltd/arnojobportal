<?php

namespace JobPortal\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answers
 */
class Answers
{
    /**
     * @var string
     */
    private $answer;

    /**
     * @var boolean
     */
    private $answerStatus;

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
     * @var \JobPortal\FrontBundle\Entity\Questions
     */
    private $question;


    /**
     * Set answer
     *
     * @param string $answer
     * @return Answers
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    
        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set answerStatus
     *
     * @param boolean $answerStatus
     * @return Answers
     */
    public function setAnswerStatus($answerStatus)
    {
        $this->answerStatus = $answerStatus;
    
        return $this;
    }

    /**
     * Get answerStatus
     *
     * @return boolean 
     */
    public function getAnswerStatus()
    {
        return $this->answerStatus;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Answers
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
     * @return Answers
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
     * Set question
     *
     * @param \JobPortal\FrontBundle\Entity\Questions $question
     * @return Answers
     */
    public function setQuestion(\JobPortal\FrontBundle\Entity\Questions $question = null)
    {
        $this->question = $question;
    
        return $this;
    }

    /**
     * Get question
     *
     * @return \JobPortal\FrontBundle\Entity\Questions 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}