<?php
function enVal($value)
{
    return trim(base64_encode(base64_encode($value)), '=');
}
function deVal($encoded)
{
    return trim(base64_decode(base64_decode($encoded)), '=');
}
function iconRole($rolename)
{
    if ($rolename == 'admin') {
        return 'fas fa-users-cog';
    } else if ($rolename == 'teacher') {
        return 'fas fa-user-tie';
    } else if ($rolename == 'student') {
        return 'fas fa-users';
    } else {
        return 'fas fa-user';
    }
}
function genToken()
{
    $token = mb_strimwidth(enVal(date('s')), 0, 6);
    return strtoupper($token);
}
function genColor()
{
    return 'rgba(' . rand(0, 200) . ',' . rand(0, 200) . ',' . rand(0, 200) . ')';
}
