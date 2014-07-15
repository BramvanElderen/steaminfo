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

        $user = $SteamLoader->getUserData('76561197999903331')['response']['players'][0];

        $friends = $SteamLoader->getSteamFriends('76561197999903331', SteamLoader::STEAMFRIENDSFILTER);
        $friend = $SteamLoader->getUserData($friends['friendslist']['friends'][0]['steamid'])['response']['players'][0];

        var_dump($friend);


        return $this->render('SteamBundle:Default:index.html.twig', [
            'userAvatar' => $user['avatar'],
            'friendAvatar' => $friend['avatar']
        ]);
    }

}
