<?php
$files = scandir('uploads/');
foreach($files as $file) {
    if($file !== "." && $file !== "..") {
        //echo ("<img src='uploads/$file' />");
        echo("<a href='uploads/$file'>$file</a>");
    }
}
?>