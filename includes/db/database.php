<?php

function conectarDB(): mysqli {
    $conect = mysqli_connect('localhost', 'root', 'root', 'taskv2');
    // if ($conect) {
    //     echo 'all good';
    // }
    return $conect;
}
