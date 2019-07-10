<?php
namespace SeoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    private $container = 'Private';


    public function load(ObjectManager $manager)
    {

        // Get our userManager, you must implement `ContainerAwareInterface`
        $userManager = $this->container->get('fos_user.user_manager');


        // Create our user and set details
        $admin = $userManager->createUser();
        $admin->setUsername('Jim');
        $admin->setEmail('jaymail04@gmail.com');
        $admin->setPlainPassword('HACIENDA');
        //$user->setPassword('3NCRYPT3D-V3R51ON');
        $admin->setEnabled(true);
        $admin->setRoles(array('ROLE_ADMIN'));

        // Update the user
        $userManager->updateUser($admin, true);




        $manager->persist($admin);
        $manager->flush();

    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

}
