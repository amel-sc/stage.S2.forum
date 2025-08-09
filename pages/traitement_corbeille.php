<?php
    require('../inc/function.php');
    // header to user_management with user_statut = -1
    $link = array();
    $link[] = array('key' => 'page', 'value' => 'user_management.php');
    $link[] = array('key' => 'user_statut', 'value' => -1);

    // value getted
    $user_id = $_GET['user_id'];

    // delete from user table
    // delete condition
    $condition = array();
    $condition[] = array('key' => 'user_id', 'value' => $user_id);
    // execute request
    $delete = delete_table('user', $condition);

    // header to user_management deleted
    header('Location: ' . navigation_link($link));
?>