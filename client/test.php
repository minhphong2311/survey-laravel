<?php
$file = 'client/test.txt';
if(!is_file($file)){
    $contents = 'test';
    file_put_contents($file, $contents);
}else{
    $contents = date("Y-m-d h:i:sa");
    file_put_contents($file, $contents);
}
?>
