<?php
$json=$_POST["json"];
$type=$_GET["type"];

switch ($type){
    case "submit":
        $type="assess";
        break;
    case "return":
        $type="return";
        break;
    case "final_submit":
        $type="final";
        break;
}
$jsons=json_decode($json,true);
$id=$jsons["id"];
echo file_put_contents($id."_".$type.".txt",$json);