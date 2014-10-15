<?php
/**
 * Created by PhpStorm.
 * User: Emrah
 * Date: 09.08.2014
 * Time: 16:00
 */

namespace Pria\ProfileBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Pria\ProfileBundle\Entity\User;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        var_dump('getting container here');
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername("user");
        $user->setSalt(md5(uniqid()));
        $encoder = new MessageDigestPasswordEncoder('sha1', false, 1);
        $user->setPassword($encoder->encodePassword('green', $user->getSalt()));
        //$encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        //$user->setPassword($encoder->encodePassword('blue', $user->getSalt()));
        $user->setEmail("user@mail.com");
        $user->setIsActive(true);

        $manager->persist($user);

        $admin = new User();
        $admin->setUsername("admin");
        $admin->setSalt(md5(uniqid()));
        $encoder = new MessageDigestPasswordEncoder('sha1', false, 1);
        $admin->setPassword($encoder->encodePassword('blue', $admin->getSalt()));
        //$encoder = $this->container->get('security.encoder_factory')->getEncoder($admin);
        //$admin->setPassword($encoder->encodePassword('blue', $admin->getSalt()));
        $admin->setEmail("admin@mail.com");
        $admin->setIsActive(true);

        $manager->persist($admin);

        $manager->flush();
    }
}