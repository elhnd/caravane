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
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $pass = $this->encode->encodePassword($user, 'admin');
            $user->setEmail("eldji$i@hotmail.fr")
                ->setPassword($pass)
                ->setPhone('77898877'.$i)
                ->setRoles(["ROLE_ADMIN"])
                ->setName("El HADJI")
                ->setIsActivated(true);
            $manager->persist($user);
        }


        $manager->flush();
    }
}
