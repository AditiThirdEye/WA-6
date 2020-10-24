<?php
header("Content-Type: application/json; charset=UTF-8");
require 'dbase.php';
require 'user.php';

$req = $_GET['req'] ?? null;
$db=new database();
$user = new candi($db->connect());

switch($req)
{
    case 'add':
        $obj=$_GET['object'];
        $temp=json_decode($obj);
        echo $user->adddetails($temp);
        break;

    case 'getD':
        echo $user->getData();
        break;

    case 'delete':
        $obj=$_GET['id'] ?? null;
        echo $user->ddata($obj);
        break;

    case 'update':
        $obj=$_GET['object'];
        $temp=json_decode($obj);
        echo $user->udata($temp);
        break;

    case 'getone':
        $obj=$_GET['id'] ?? null;
        echo $user->rdata($obj);
        break;

    default:
        echo json_encode(["Invalid request"]);
        break;
}

?>