<?php
namespace App\Controller;

use App\Repository\ClientRepository;

class ClientDateInterval {

    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function __invoke($dateStart,$dateEnd)
    {
       return $this->clientRepository->getClientsInDate($dateStart,$dateEnd);

    }

}