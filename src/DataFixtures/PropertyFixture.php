<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Biens;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 100; $i++) {
            $property = new Biens();
            $property->setTitle($faker->words(3,true));
            $property->setSurface($faker->numberBetween(30,8000));
            $property->setPicture('https://dummyimage.com/600x400/2e282e/fff.jpg');
            $property->setPrice($faker->numberBetween(300000,80000000));
            $manager->persist($property);
                     
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
