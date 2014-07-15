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
        $SteamLoader = new SteamLoader(
            [
                'steamKey' => $this->container->getParameter('steam_key')
            ]
        );

        if (!isset($_GET['steam_id'])) {
            return $this->render('SteamBundle:Default:index.html.twig');
        }
        $steamId = $_GET['steam_id'];
        $user = $SteamLoader->getUserData($steamId)['response']['players'][0];

        return $this->render('SteamBundle:Default:index.html.twig', [
            'SUCCESS' => TRUE,
            'userAvatar' => $user['avatarfull'],
            'name' => $user['personaname'],
            'nameGame' => $user['gameextrainfo'],
            'profileUrl' => $user['profileurl']
        ]);
    }
}