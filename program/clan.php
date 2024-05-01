<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Clan.controller.php");

$clan = new ClanController();

if (isset($_POST['add'])) {
    //memanggil add
    $clan->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $clan->delete($id);
}
else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $clan->edit($id);
}
else{
    $clan->index();
}

