<?php

namespace App\EventsSubscriber\User;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserRegister extends AbstractController implements EventSubscriberInterface
{

    private $encode;
    private $mailer;
    private $params;

    public function __construct(
        UserPasswordEncoderInterface $encode,
        \Swift_Mailer $mailer,
        ParameterBagInterface $params
    ) {
        $this->encode = $encode;
        $this->mailer = $mailer;
        $this->params = $params;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['sendEmailRegister', EventPriorities::POST_WRITE]
        ];
    }

    public function sendEmailRegister(ViewEvent $event)
    {

        $user = $event->getControllerResult();

        $method = $event->getRequest()->getMethod();
        $data = json_decode($event->getRequest()->getContent(), true);
        //dd($data);
        if ($user instanceof User && $method === "POST") {
            $message = (new \Swift_Message('test'))
                ->setSubject('Inscription sur CARAVANE')
                ->setFrom('noreplay20@gmail.com')
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView(
                        'user/signup.html.twig',
                        [
                            'password' => $data["password"],
                            'user' => $user,
                            'url' => 'htttps://www.caravanebyerc.com/login',
                        ]
                    ),
                    'text/html'
                );

            $this->mailer->send($message);
        }
    }
}
