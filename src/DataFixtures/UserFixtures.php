<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {
        $SupAdmin= new Role();
        $SupAdmin -> SetLibelle("ROLE_SUP_ADMIN");
        $manager->persist($SupAdmin);

        $Admin= new Role();
        $Admin -> SetLibelle("ROLE_ADMIN");
        $manager->persist($Admin);

        $Caissier= new Role();
        $Caissier -> SetLibelle("ROLE_CAISSIER");
        $manager->persist($SupAdmin);

        $manager->flush();
        // ...
        $this->addReference('role_sup_admin', $SupAdmin);
        $this->addReference('role_admin', $Admin);
        $this->addReference('role_caissier', $Caissier);

        $roleSupAdmin = $this->getReference('role_sup_admin');
        $roleAdmin = $this->getReference('role_admin');
        $roleCaissier = $this->getReference('role_caissier');

        //...

        $user = new User();
        $user->setNom("Ba");
        $user->setPrenom("Moussa");
        $user->setUsername("Moussa09");
        $user->setEmail("moses@email.com");
        $user->setRoles(array (
            "ROLE_SUP_ADMIN","ROLE_ADMIN","ROLE_CAISSIER"
        ));
        $user->setPassword($this->passwordEncoder->encodePassword($user,'login' ));
        $user->setRole($roleSupAdmin);
        

        // ...
        $manager->persist($user);
        $manager->flush();
    }
}
