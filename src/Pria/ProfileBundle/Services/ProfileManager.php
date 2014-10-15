<?php
namespace Pria\ProfileBundle\Services;

use Doctrine\ORM\EntityManager;
use Pria\ProfileBundle\Entity\User;

class ProfileManager {

    /**
     * @var EntityManager $em
     */
    protected $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    /**
     * @param string $username
     * @return User
     */
    public function findByRoleName($username){
        return $this->em->getRepository('PriaProfileBundle:User')->loadUserByUsername($username);
    }

} 