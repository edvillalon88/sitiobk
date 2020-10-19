<?php
// src/EventListener/RequestListener.php
namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\RequestEvent;

class RequestListener
{
    public function onKernelRequest(RequestEvent $event)
    {
        /*$request = $event->getRequest();

        // lógica para determinar el $locale
        $request->setLocale($locale);*/
    }
}
