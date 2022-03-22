<?php

namespace App\Controller;

use App\Assets\Guestbook\GuestbookView;
use App\Assets\UploadGuestbook\UploadGuestbookView;
use App\Services\GuestbookFormer;
use Core\Controller;

class Guestbook extends Controller
{
    public function guestbook() {
        $guestbook = new GuestbookFormer();

        $guestbook->addToGuestbook();

        $view = new GuestbookView('Guestbook/Guestbook.php', $guestbook->formGuestbook());

        return $view;
    }

    public function upload() {
        $guestbook = new GuestbookFormer();

        if ($guestbook->uploadGuestbook()) {
            header('Location: http://127.0.0.1:80');
            die();
        }

        $view = new UploadGuestbookView('UploadGuestbook/UploadGuestbook.php', null);

        return $view;
    }
}
