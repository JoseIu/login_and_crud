<?php

function conectarDB(): mysqli {
    $conect = mysqli_connect('localhost', 'root', 'root', 'taskv2');

    return $conect;
}
