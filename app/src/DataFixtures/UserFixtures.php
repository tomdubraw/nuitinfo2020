<?php

namespace App\DataFixtures;

use App\Entity\FavCity;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private UserPasswordEncoderInterface $encoder;
    private Generator $faker;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager)
    {
        $user = $this->getAdminUser();
        $manager->persist($user);

        foreach (range(0, 20) as $i) {
            $user = $this->getNumberedUser($i);

            foreach (['Paris', 'Reims', 'Berlin'] as $city) {
                $fav = new FavCity();
                $fav->setLabel($city);
                $fav->setUser($user);
                $manager->persist($fav);
            }

            $manager->persist($user);
        }

        $manager->flush();
    }

    private function getNumberedUser(int $i): User
    {
        $user = new User();

        $user->setEmail(sprintf('user%s@test.co', $i));

        $user->setPassword($this->encoder->encodePassword($user, 'Test1234'));

        return $user;
    }

    private function getAdminUser(): User
    {
        $user = new User();

        $user->setEmail('admin@test.co');
        $user->setRoles(['ROLE_ADMIN']);

        $user->setPassword($this->encoder->encodePassword($user, 'Test1234'));

        return $user;
    }
}
