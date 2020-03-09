<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class AppUser extends Fixture
{

    /**
     * @var PasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->passwordEncoder = $encoderFactory->getEncoder(User::class);
    }

    public function load(ObjectManager $manager)
    {
        $users = [
            [
                'email' => 'admin@domain.com',
                'password' => 'admin',
                'roles' => ['ROLE_ADMIN']
            ],
            [
                'email' => 'user@domain.com',
                'password' => 'user',
                'roles' => []
            ]
        ];

        foreach ($users as $arrayUser) {
            $user = new User();
            $user->setEmail($arrayUser['email'])
                ->setPassword($this->passwordEncoder->encodePassword($arrayUser['password'], ''))
                ->setRoles($arrayUser['roles']);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
