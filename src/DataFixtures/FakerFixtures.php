<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class FakerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        // on créé 10 personnes
        for ($i=0; $i < 10; $i++) {
            $user = new User();
            $user->setPassword($faker->password);
            $user->setFirstName($faker->firstName);
            $user->setLastName($faker->lastName);
            $user->setAddress($faker->streetAddress);
            $user->setEmail($faker->email);
            $user->setPhone($faker->phoneNumber);
            $user->setComment($faker->text);
            $user->setCreatedAt($faker->dateTime);
            $user->setUpdatedAt($faker->dateTime);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
