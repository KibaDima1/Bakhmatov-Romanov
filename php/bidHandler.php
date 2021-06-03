<?php
require_once 'exceptions.php';
require_once 'bidDAO.php';

session_start();

if (!isset($_GET['method']))
    return;

try {
    switch ($_GET['method']) {
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
} catch (Exception $err) {
    echo $err->getCode() . ": " . $err->getMessage();
}
