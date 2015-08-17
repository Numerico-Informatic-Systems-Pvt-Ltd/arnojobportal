<?php

namespace JobPortal\AdminBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Questions
 *
 * @ORM\Table(name="questions")
 * @ORM\Entity
 */
class Questions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="text", nullable=false)
     */
    private $question;

    /**
     * @var integer
     *
     * @ORM\Column(name="standard_type", type="integer", nullable=false)
     */
    private $standardType;

    /**
     * @var float
     *
     * @ORM\Column(name="marks_positive", type="float", nullable=false)
     */
    private $marksPositive;

    /**
     * @var float
     *
     * @ORM\Column(name="marks_negative", type="float", nullable=false)
     */
    private $marksNegative;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false)
     */
    private $isDeleted;

    /**
     * @var \Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Answers", mappedBy="question")
     */
    private $answers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

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
     * @param \JobPortal\AdminBundle\Entity\Categories $category
     * @return Questions
     */
    public function setCategory(\JobPortal\AdminBundle\Entity\Categories $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \JobPortal\AdminBundle\Entity\Categories 
     */
    public function getCategory()
    {
        return $this->category;
    }
}