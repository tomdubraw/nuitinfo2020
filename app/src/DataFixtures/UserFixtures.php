<?php

namespace App\DataFixtures;

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
            $manager->persist($user);
        }

        $manager->flush();
    }

    private function getNumberedUser(int $i): User
    {
        $user = new User();

        $user->setUsername("user$i");
        $user->setEmail(sprintf('user%s@%s', $i, $this->faker->freeEmailDomain));
        $user->setFirstname($this->faker->firstName);
        $user->setLastname($this->faker->lastName);

        $user->setPassword($this->encoder->encodePassword($user, 'Test1234'));

        return $user;
    }

    private function getAdminUser(): User
    {
        $user = new User();

        $user->setUsername('admin');
        $user->setEmail(sprintf('admin@%s', $this->faker->safeEmailDomain));
        $user->setFirstname($this->faker->firstName);
        $user->setLastname($this->faker->lastName);
        $user->setRoles(['ROLE_ADMIN']);

        $user->setPassword($this->encoder->encodePassword($user, 'Test1234'));

        return $user;
    }
}
