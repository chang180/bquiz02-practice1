<?php
include_once "../base.php";
$acc=$_GET["acc"];
$pw=$_GET["pw"];

$chk=$User->count(['acc'=>$acc,'pw'=>$pw]);
if($chk>0){
    echo "1";
    $_SESSION['login']=$acc;
}else{
    echo "0"; 
}

?>