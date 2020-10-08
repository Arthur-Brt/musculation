<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $user = new User();
         $user->setName('Arthur');
         $user->setTaille('179');
         $user->setSexe('Mâle');
         $user->setPoids([78,79,80,76,75]);
         $user->setMasseGraisseuse([14.6,15.0,14.8,14.6,14.7]);
         $user->setMasseMusculaire([45.9,50.0,46.6,47.6,48.5]);
        $user->setDateMesure([1,2,3,4,5]);
        $manager->persist($user);

        $manager->flush();
    }
}
