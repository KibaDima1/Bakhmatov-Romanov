<?php
    require_once 'bidDAO.php';

    session_start();

    if(!isset($_GET['method']))
        return;

    switch($_GET['method']) {
        case 'insert':
            $bid = new Bid(0, $_GET['id'], $_SESSION['user']->id, date('Y-m-d'));
            $res = BidDAO::insert($bid);
            header("Location: ../sites/tours.php");
            break;
        case 'delete':
            $res = BidDAO::delete($_GET['id']);
            header("Location: ../sites/tours.php");
            break;
    }
?>