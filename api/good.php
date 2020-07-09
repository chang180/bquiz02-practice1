<?php
include_once "../base.php";

switch($_POST['type']){
    case "1":
        $Log->save(["news"=>$_POST['id'],"user"=>$_SESSION['login']]);
        $n=$News->find($_POST['id']);
        $n['good']++;
        $News->save($n);
    break;
    case "2":
        $Log->del(["news"=>$_POST['id'],"user"=>$_SESSION['login']]);
        $n=$News->find($_POST['id']);
        $n['good']--;
        $News->save($n);
    break;
}

?>