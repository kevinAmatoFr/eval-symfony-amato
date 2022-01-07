<?php

namespace App\DataFixtures;

use App\Entity\Compagny;
use App\Entity\Customer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i = 1; $i < 31 ; $i++){
            $customer = (new Customer())
            ->setFirstname("Louis")
            ->setLastname("$i")
            ->setEmail("darkLouis$i@monarchie.fr")
            ->setPhone("08 36 65 65 65");

            if($i < 11){
                $compagny = (new Compagny())
                ->setName("Entreprise lambda $i")
                ->setSiret(100000 + "$i")
                ->setAdress("$i rue machin")
                ->setZipCode("570$i")
                ->setCity("ville$i");
            }
          
            $manager->persist($compagny);
            $manager->persist($customer);
        }

        $manager->flush();
    }
}
