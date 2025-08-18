<?php
    require('../inc/function.php');
    session_start();
    // naviagtion link
    $link = array();
    $link[] = array('key' => 'page', 'value' => null);
    $page_index = get_index($link, "page");
    // lastest user statut
    $user_statut = $_SESSION['user_statut'];
    // lastest page (in pagination)
    $index_pagination = $_SESSION['index_pagination'];

    // value getted
    $user_id = $_GET['user_id'];

    // delete from user table
    // delete condition
    $condition = array();
    $condition[] = array('key' => 'user_id', 'value' => $user_id);
    // execute request
    $delete = delete_table('user', $condition);

    // header to user_management
    $link[$page_index]['value'] = 'user_management.php';
    $link[] = array('key' => 'user_statut', 'value' => $user_statut);
    $link[] = array('key' => 'index_pagination', 'value' => $index_pagination);
    header('Location: ' . navigation_link($link));
?>