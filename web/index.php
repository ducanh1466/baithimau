<?php

session_start();

require_once './configs/env.php';
require_once './configs/helper.php';

spl_autoload_register(function ($class) {
    $fileName = "$class.php";

    $fileModel = PATH_MODEL . $fileName;
    $fileControllerClient = PATH_CONTROLLER_CLIENT . $fileName;
    $fileControllerAdmin = PATH_CONTROLLER_ADMIN . $fileName;

    if (is_readable($fileModel)) {
        require_once $fileModel;
    } 
    else if (is_readable($fileControllerClient)) {
        require_once $fileControllerClient;
    }
    else if (is_readable($fileControllerAdmin)) {
        require_once $fileControllerAdmin;
    }
});

// Điều hướng
$mode = $_GET['mode'] ?? 'client';

if ($mode == 'client') {
    require_once './routes/client.php';
} else {
    require_once './routes/admin.php';
}