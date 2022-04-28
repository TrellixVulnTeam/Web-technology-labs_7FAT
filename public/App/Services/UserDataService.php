<?php

namespace App\Services;

use App\Entity\UserData;
use App\Repository\UserDataRepository;

class UserDataService
{
    public static function saveUserData() {
        $userData = new UserData();

        $userData->setVisitDate(date('Y/m/d H:i:s'));
        $userData->setBrowserName($_SERVER['HTTP_USER_AGENT']);
        $userData->setIpAddress($_SERVER['REMOTE_ADDR']);
        $userData->setHostname(gethostbyaddr($_SERVER['REMOTE_ADDR']));
        $userData->setWebpageAddress($_SERVER['REQUEST_URI']);

        $userDateRepository = new UserDataRepository();
        $userDateRepository->save($userData);
        $userDateRepository->exec();
    }
}
