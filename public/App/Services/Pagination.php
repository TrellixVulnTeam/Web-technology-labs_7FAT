<?php

namespace App\Services;

define("POSTS_ON_SINGLE_PAGE", 4);

trait Pagination
{
    public function getCurrentPage() {
        return (int)(explode('/',$_SERVER['REQUEST_URI'])[2]);
    }

    public function getMaxPage(int $pageCount) {
        if ($pageCount % POSTS_ON_SINGLE_PAGE === 0) return (int)($pageCount / POSTS_ON_SINGLE_PAGE);
        else return ((int)($pageCount / POSTS_ON_SINGLE_PAGE + 1));
    }

    public function countCurrentFirstPost() {
        return $this->getCurrentPage() * POSTS_ON_SINGLE_PAGE - (POSTS_ON_SINGLE_PAGE - 1);
    }
}
