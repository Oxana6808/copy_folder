<?php

$folderFrom = 'c:/film';

$folderTo = 'd:/films';

$numFolder = 0;
$numFile = 0;


function start($folderA,$folderB) {
  //  $folderA = A;
 //   $folderB = B;
     global $numFile, $numFolder;

    $dir = opendir($folderA);
    @mkdir($folderB);

    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($folderA . '/' . $file) ) {
                start($folderA . '/' . $file,$folderB . '/' . $file);
              //  global $num;
              $numFolder++;

            }
            else {
                copy($folderA . '/' . $file, $folderB . '/' . $file);
                $numFile++;
            }
        }
    }
    closedir($dir);
}

start($folderFrom,$folderTo);

echo $numFile . " file". $numFolder;

?>


<html></html>