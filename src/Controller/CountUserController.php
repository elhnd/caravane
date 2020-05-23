<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CountUserController extends AbstractController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke()
    {
        $totalUser = $this->userRepository->getAll();
        $totalUsers = count($totalUser);
        $tatalUserActifs = $this->userRepository->getAllUser(true);
        $tatalUserActifs = count($tatalUserActifs);
        $tatalUserInactifs = $this->userRepository->getAllUser(false);;
        $tatalUserInactifs = count($tatalUserInactifs);

        $total = [
            'totalUser' => $totalUsers,
            'totalUserActifs' => $tatalUserActifs,
            'totalUserInactifs' => $tatalUserInactifs
        ];


        return $this->json($total);
    }
}
