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

    const STEAMURL = 'http://api.steampowered.com/';
    const USERURL = 'ISteamUser/';

    public function __construct($params)
    {
        $this->steamKey = $params['steamKey'];
    }

    public function getSteamFriends($steam_user_id, $relationship) {
        $params = [
            'steamid' => $steam_user_id,
            'relationship' => $relationship
        ];

        $exec_url = SteamLoader::STEAMURL . SteamLoader::USERURL . '?' . http_build_query($params, null, '&');
        $result = $this->exec_url($exec_url);

        if(!$result) {
            return false;
        }
        return $result;
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