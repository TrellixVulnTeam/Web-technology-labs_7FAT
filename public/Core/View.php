<?php

namespace Core;

class View
{
    public function getView($viewName = null, $data = null) {
        if (is_array($data)) {
            extract($data);
        }

        include 'App/Assets/'.$viewName;
    }
}
