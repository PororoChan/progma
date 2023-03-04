<?php
function enVal($value)
{
    return base64_encode(base64_encode($value));
}
function deVal($encoded)
{
    return base64_decode(base64_decode($encoded));
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
