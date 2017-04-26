<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Utilisateur;

class LoadUserData  extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new Utilisateur();
        $userAdmin->setUsername('admin');
        $userAdmin->setPlainPassword('admin');
        $userAdmin->setNom('Admin');
        $userAdmin->setPrenom('Admin');
        $userAdmin->setEmail('Admin@local');
        $userAdmin->setEnabled(true);
        $userAdmin->addRole("ROLE_SUPER_ADMIN");

        $user = new Utilisateur();
        $user->setUsername('test');
        $user->setPlainPassword('test');
        $user->setNom('Test');
        $user->setPrenom('Test');
        $user->setEmail('test@local');
        $user->setEnabled(true);
        $user->addRole("ROLE_UTILISATEUR");

        $manager->persist($userAdmin);
        $manager->persist($user);
        $manager->flush();

        $this->addReference('admin-user', $userAdmin);
        $this->addReference('user', $user);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}