<?php

class AdminDashboardController
{
    public function index()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location: ?mode=admin&action=login");
            exit;
        }

        $title = "Dashboard Admin";
        $view = "dashboard";

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function notFound()
    {
        echo "404 Not Found";
    }
}