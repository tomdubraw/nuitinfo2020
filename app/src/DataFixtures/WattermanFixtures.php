<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Watterman;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WattermanFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = $manager->getRepository(User::class)->findBy(['email' => 'user0@test.co'])[0];

        $watterman = new Watterman();
        $watterman->setLastname('Dupuit');
        $watterman->setFirstname('Jean');
        $watterman->setUser($user);

        $manager->persist($watterman);
        $manager->flush();
    }
}
