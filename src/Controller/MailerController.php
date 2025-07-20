<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    #[Route('/send-email', name: 'app-send-email')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('no-reply@yourdomain.com')
            ->to('recipient@example.com')
            ->subject('hello from symfony')
            ->text('This is a plain-text message.')
            ->html('<h1>Hello!<h1><p>This is an HTML message.</p>');

        $mailer->send($email);

        return new Response('Email sent successfully');
    }
}
