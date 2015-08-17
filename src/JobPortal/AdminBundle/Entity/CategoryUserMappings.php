<?php

namespace JobPortal\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoryUserMappings
 */
class CategoryUserMappings
{
    /**
     * @var integer
     */
    private $userId;

    /**
     * @var integer
     */
    private $categoryId;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set userId
     *
     * @param integer $userId
     * @return CategoryUserMappings
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
     * Set categoryId
     *
     * @param integer $categoryId
     * @return CategoryUserMappings
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    
        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
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
