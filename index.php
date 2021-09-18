<?php
function start($folderA,$folderB) {
    $folderA = A;
    $folderB = B;
    $dir = opendir($folderA);
    @mkdir($folderA);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($folderA . '/' . $file) ) {
                start($folderA . '/' . $file,$folderB . '/' . $file);
                echo count ($dir);

            }
            else {
                copy($folderA . '/' . $file, $folderB . '/' . $file);
                echo count ($file);


            }
        }
    }
    closedir($dir);
}

?>
