<?php
function autenticado(): bool {
    session_start();
    $auth = $_SESSION['login'];
    if ($auth) {
        return true;
    }

    return false;
}

function getUsderID(): string {
    session_start();
    $id = $_SESSION['usuarioID'];
    if ($id) {
        return $id;
    }
}
