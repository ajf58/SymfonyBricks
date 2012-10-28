<?php
namespace Bricks\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var datetime $created_at
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @var datetime $updated_at
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated_at;
    
    /**
     * @ORM\OneToMany(targetEntity="Bricks\SiteBundle\Entity\Brick", mappedBy="user", cascade={"persist"})
     * @ORM\OrderBy({"created_at" = "ASC"})
     */
    private $bricks;

    /**************************************************************************************************
     *	custom functions
    **************************************************************************************************/
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    /**************************************************************************************************
     *	getters and setters
    **************************************************************************************************/
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add bricks
     *
     * @param Bricks\SiteBundle\Entity\Brick $bricks
     * @return User
     */
    public function addBrick(\Bricks\SiteBundle\Entity\Brick $bricks)
    {
        $this->bricks[] = $bricks;
    
        return $this;
    }

    /**
     * Remove bricks
     *
     * @param Bricks\SiteBundle\Entity\Brick $bricks
     */
    public function removeBrick(\Bricks\SiteBundle\Entity\Brick $bricks)
    {
        $this->bricks->removeElement($bricks);
    }

    /**
     * Get bricks
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getBricks()
    {
        return $this->bricks;
    }
}