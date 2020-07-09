<?php
include_once "../base.php";

$opt=$Que->find($_POST['opt']);
$parent=$Que->find($_POST['parent']);
$opt['count']++;
$parent['count']++;
$Que->save($opt);
$Que->save($parent);

to("../index.php?do=result&id=".$_POST['parent']);

?>