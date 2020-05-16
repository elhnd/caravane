<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encode;
    public function __construct(UserPasswordEncoderInterface $encode)
    {
        $this->encode = $encode;
    }
    public function load(ObjectManager $manager)
    {
        
        $user = new User();
        $pass = $this->encode->encodePassword($user,'admin');
        $user->setEmail("eldji22@hotmail.fr")
             ->setPassword($pass);
        $manager->persist($user);
        $manager->flush();
    }
}
