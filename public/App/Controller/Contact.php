<?php

namespace App\Controller;

use App\Assets\Contact\ContactView;
use App\Services\ContactValidator;

class Contact
{
    public function contact() {
        $validator = new ContactValidator();

        $view = new ContactView('Contact/Contact.php', $validator->validate());

        return $view;
    }
}
