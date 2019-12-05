<?php

namespace eventsBundle\Controller;

use eventsBundle\Entity\Events;
use eventsBundle\Form\EventsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@events/Default/index.html.twig');
    }
    public function eventsAction()
    {
        return $this->render('@events/Default/index.html.twig');
    }

}
