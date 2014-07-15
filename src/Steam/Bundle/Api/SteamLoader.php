<?php
/**
 * Created by PhpStorm.
 * User: Bram
 * Date: 7/15/14
 * Time: 6:23 PM
 */

namespace Steam\Bundle\Api;


class SteamLoader
{

    private $steamKey;

    const STEAMURL = 'http://api.steampowered.com';
    const USERURL = '/ISteamUser';

    const STEAMFRIENDSFILTER = 'friend';
    const STEAMFRIENDSALL = 'all';

    public function __construct($params)
    {
        $this->steamKey = $params['steamKey'];
    }

    public function getUserData($steamid)
    {
        $params = [
            'key' => $this->steamKey,
            'steamids' => $steamid
        ];

        $exec_url = SteamLoader::STEAMURL . SteamLoader::USERURL . '/GetPlayerSummaries/v0002/?' . http_build_query($params, null, '&');
        $result = $this->exec_url($exec_url);

        if(!$result) {
            return false;
        }
        return $result;
    }

    public function getSteamFriends($steam_user_id, $relationship)
    {
        $params = [
            'key' => $this->steamKey,
            'steamid' => $steam_user_id,
            'relationship' => $relationship
        ];

        $exec_url = SteamLoader::STEAMURL . SteamLoader::USERURL . '/GetFriendList/v0001/?' . http_build_query($params, null, '&');
        $result = $this->exec_url($exec_url);

        if(!$result) {
            return false;
        }
        return $result;
    }

    public function getGameInfo($steam_game_id)
    {
        return 0;
    }

    private function exec_url($url)
    {
        $content = @file_get_contents($url);
        if(!$content) {
            return false;
        }
        return json_decode($content, TRUE);
    }
} 