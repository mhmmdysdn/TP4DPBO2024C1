<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Clan.class.php");
include_once("views/Members.view.php");

class MembersController {
  private $members;
  private $clan;

  function __construct(){
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->clan = new Clan(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->clan->open();
    $this->members->getMembers();
    $this->clan->getClan();

    $data = array(
        'members' => array(),
        'clan' => array()
    );

    while($row = $this->members->getResult()){
      array_push($data['members'], $row);
    }

    while($row = $this->clan->getResult()){
      array_push($data['clan'], $row);
    }

    $this->members->close();
    $this->clan->close();

    $view = new MembersView();
    $view->render($data);
  }

  
  function add($data){
    $this->members->open();
    $this->members->add($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function edit($id){
    $this->members->open();
    $this->members->update($id);
    $this->members->close();
    
    header("location:index.php");
  }

  function delete($id){
    $this->members->open();
    $this->members->delete($id);
    $this->members->close();
    
    header("location:index.php");
  }


}