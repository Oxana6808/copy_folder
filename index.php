<?php

// путь до папки от куда копируем
$folderFrom = 'folderA';

// путь до папки куда копируем
$folderTo = 'folderB';

// количество папок скопированных
$numFolder = 0;
// количество файлов которые скопировали
$numFile = 0;
/**
 * функция копирования файлов и папок
 * Законченное решение
 */
function start($folderA,$folderB) { 
     global $numFile, $numFolder;

    $dir = opendir($folderA);
    @mkdir($folderB);
    // перебираем все файлы в текущей папке
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($folderA . '/' . $file) ) {
                // если папка существует то рекурсивно её копируем
                start($folderA . '/' . $file,$folderB . '/' . $file);
              $numFolder++;
            }
            else {
                // файл тоже копируем, но без рекурсии
                copy($folderA . '/' . $file, $folderB . '/' . $file);
                $numFile++;
            }
        }
    }
    // Заканчиваем чтение папки. 
    // Держат открытой папку плохая практика
    closedir($dir);
}

// запускаем скрипт копирования файлов
start($folderFrom,$folderTo);
echo " файлы={$numFile} <br> папки={$numFolder}";
