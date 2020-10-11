<?php

function checkPermission($name) {
    $check = (auth()->user()->getAllPermissions()->filter(function ($permission, $key) use ($name) {
        return $permission->name === $name;
    }))->all();

    if (!$check) {
        return \abort(403);
    }
}

function checkRole($name) {
    $check = (auth()->user()->getRoleNames()->filter(function ($roles, $key) use ($name) {
        return $roles === $name;
    }))->all();

    if (!$check) {
        return false;
    }

    return true;
}

?>
