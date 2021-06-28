<?php


namespace App\Notification;

use App\Entity\Contact;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;



class ContactNotification
{

    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function notify(Contact $contact)
    {

        dd($contact);
        // $email = (new Email())
        //     ->from($contact->getEmail())
        //     ->to('truellucastest@gmail.com')
        //     ->subject('Demande de contact')
        //     ->text("Je suis {$contact->getFirstname()} et j'aimerais avoir des renseignement sur le Gite {$contact->getGite()->getName()}");

        // $this->mailer->send($email);
    }
}
