<?php
    require_once '../php/bidDAO.php';
	require_once '../php/toursDAO.php';
	require_once '../php/usersDAO.php';

    session_start();

    $id = $_GET['id'];

    switch($_GET['object']) {
        case 'users':
            switch($_GET['method']) {
                case "delete":
                    $res = UsersDAO::delete($id);
                    break;
                case "update":
                    break;
            }
            break;
        case 'bids':
            switch($_GET['method']) {
                case "delete":
                    $res = BidDAO::delete($id);
                    break;
                case "update":
                    break;
            }
            break;
        case 'tours':
            switch($_GET['method']) {
                case "delete":
                    $res = ToursDAO::delete($id);
                    break;
                case "update":
                    break;
            }
            break;
    }
    header("Location: ../sites/admin.php");
    if($res == -1)
        echo '<script>alert("Не получилось");</script>';
?>