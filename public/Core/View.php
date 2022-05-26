<?php

namespace Core;

class View
{
    public function addCss($stylesheetLink) {
        try {
            include 'App/Assets/'.$stylesheetLink;
        }
        catch (\Exception $exception) {

        }
    }

    public function getView($viewName = null, $data = null) {
        if (is_array($data)) {
            extract($data);
        }

        include 'App/Assets/SiteHead/head.php';
        include 'App/Assets/'.$viewName;
    }
}
