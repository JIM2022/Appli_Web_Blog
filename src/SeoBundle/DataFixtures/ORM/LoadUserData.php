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


        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('user');
        $user->setEmail('user@domain.com');
        $user->setPlainPassword('user');
        //$user->setPassword('3NCRYPT3D-V3R51ON');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));

        // Update the user
        $userManager->updateUser($user, true);


        $manager->persist($admin);
        $manager->persist($user);
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
