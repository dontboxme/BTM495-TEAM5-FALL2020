<?php
$json=$_POST["json"];
$jsons=json_decode($json,true);
$id=$jsons["id"];
echo file_put_contents($id."_confirm.txt",$json);