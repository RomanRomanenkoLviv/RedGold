<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class EmailRestrictionException extends HttpException
{
    public function __construct()
    {
        parent::__construct(403, 'Restricted to use email');
    }

    public function handle($event)
    {
        $sendingToEmails = array_keys(
            $event->message->getTo()
        );

        $restrictedEmails = [
            'support@ideil.com',
            'admin@ideil.com',
        ];

        if ($restrictedEmails = array_intersect($sendingToEmails, $restrictedEmails)) {
            $this->message .= ': ' . implode('; ', $restrictedEmails);
            throw $this;
        }
    }
}
