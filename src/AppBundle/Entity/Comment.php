<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
      
//   /**
//     * @var \DateTime
//     *
//     * @ORM\Column(name="created_by", type="string", lenght = 255)
//     */
//    private $createdBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="users", type="string", length=255)
     */
    private $users;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="number_of_comments", type="integer")
     */
    private $numberOfComments;

    
    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
       
    }
    
    /**
     * Set id
     *
     * @param integer $id
     * @return Comment
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Comment
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set users
     *
     * @param string $users
     * @return Comment
     */
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return string 
     */
    public function getUsers()
    {
        return $this->users;
    }
    /**
     * Set numberOfComments
     *
     * @param integer $numberOfComments
     * @return Users
     */
    public function setNumberOfComments($numberOfComments)
    {
        $this->numberOfComments = $numberOfComments;

        return $this;
    }

    /**
     * Get numberOfComments
     *
     * @return integer 
     */
    public function getNumberOfComments()
    {
        return $this->numberOfComments;
    }
}
