<?php
require_once 'exceptions.php';
require_once 'bidDAO.php';
require_once 'toursDAO.php';
require_once 'usersDAO.php';

session_start();

$id = $_GET['id'];

try {
    switch ($_GET['object']) {
        case 'users':
            switch ($_GET['method']) {
                case "delete":
                    $res = UsersDAO::delete($id);
                    break;
                case "update":
                    break;
            }
            break;
        case 'bids':
            switch ($_GET['method']) {
                case "delete":
                    $res = BidDAO::delete($id);
                    break;
                case "update":
                    break;
            }
            break;
        case 'tours':
            switch ($_GET['method']) {
                case "delete":
                    $res = ToursDAO::delete($id);
                    break;
                case "update":
                    break;
            }
            break;
    }
    header("Location: ../sites/admin.php");
    if ($res == -1)
        echo '<script>alert("Не получилось");</script>';
} catch (Exception $err) {
    echo $err->getCode() . ": " . $err->getMessage();
}
