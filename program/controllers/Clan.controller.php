<?php
include_once("conf.php");
include_once("models/Clan.class.php");
include_once("views/Clan.view.php");

class ClanController {
  private $clan;

  function __construct(){
    $this->clan = new Clan(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->clan->open();
    $this->clan->getClan();
    $data = array();
    while($row = $this->clan->getResult()){
      array_push($data, $row);
    }

    $this->clan->close();

    $view = new ClanView();
    $view->render($data);
  }

  
  function add($data){
    $this->clan->open();
    $this->clan->add($data);
    $this->clan->close();
    
    header("location:clan.php");
  }

  function edit($id){
    $this->clan->open();
    $this->clan->update($id);
    $this->clan->close();
    
    header("location:clan.php");
  }

  function delete($id){
    $this->clan->open();
    $this->clan->delete($id);
    $this->clan->close();
    
    header("location:clan.php");
  }


}