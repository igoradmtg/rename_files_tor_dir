<?php
// Rename files and move to catalog
// name1-001.jpg -> name1-
// name1-002.jpg -> name1-
// name1-003.jpg -> name1-
// name1-004.jpg -> name1-
// name2-001.jpg -> name2-
// name2-002.jpg -> name2-
// name2-003.jpg -> name2-
// name4-001.jpg -> name4-
// name5-002.jpg -> name5-
// name5-003.jpg -> name5-
require('str.php');
$dir = 'z:/upl2';
$num_str_count = 4; // 4 - name1-0001.jpg , 3 - name1-001.jpg , 2 - name1-01.jpg 
$ar = dir_to_array_nr($dir,true);
if ($ar == false) {
    exit("Not found files $dir");
}
foreach($ar as $fname) {
    $bname = basename($fname);
    echo "$fname $bname" . PHP_EOL;
    $pos = strrpos($bname,'.');
    if ($pos === false) {
        continue;
    }
    $dir_name = substr($bname,0,$pos);
    $dir_name = substr($dir_name,0,strlen($dir_name)-$num_str_count);
    echo "$dir_name " . PHP_EOL;
    $dir_full_name = $dir.'/'.$dir_name;
    if (!is_dir($dir_full_name)) {
        mkdir($dir_full_name);
    }
    rename($fname,$dir_full_name.'/'.$bname);
    
}