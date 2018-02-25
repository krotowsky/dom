<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @return mixed
     */
    public function getUserId(){
        return $this->id;
    }

    /**
     * @ORM\Column(name="avatar_url", type="string", nullable=true)
     */
    protected $avatarUrl;

    /**
     * get AvatarUrl
     *
     * @return mixed
     */
    public function getAvatarUrl(){
        return $this->avatarUrl;
    }

    /**
     * set AvatarUrl
     *
     * @param $avatarUrl
     */
    public function setAvaratUrl($avatarUrl){
        $this->avatarUrl = $avatarUrl;
    }

    /**
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="user_id")
     */
    private $transactions;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
        parent::__construct();
    }
}