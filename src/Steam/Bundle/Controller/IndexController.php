<?php

namespace Steam\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Steam\Bundle\Api\SteamLoader;

class IndexController extends Controller
{
    public function indexAction()
    {
        return $this->render('SteamBundle:Default:index.html.twig');
    }

    public function userAction()
    {
        $SteamLoader = new SteamLoader($this->container->getParameter('steamKey'));



        return 0;
    }

}
