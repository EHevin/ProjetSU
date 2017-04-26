<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Annonce;

class LoadAnnonceData  extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $ann1 = new Annonce();
        $ann1->setTitre("test");
        $ann1->setDescription("test");
        $ann1->setAuteur($this->getReference("admin-user"));

        $ann2 = new Annonce();
        $ann2->setTitre("test");
        $ann2->setDescription("test");
        $ann2->setAuteur($this->getReference("user"));


        $manager->persist($ann1);
        $manager->persist($ann2);

        $manager->flush();


    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}