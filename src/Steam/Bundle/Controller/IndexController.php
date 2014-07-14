<?php

namespace Steam\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SteamBundle:Default:index.html.twig', array('name' => $name));
    }
}
