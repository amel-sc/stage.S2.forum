<?php
    require('../inc/function.php');
    // naviagtion link
    $link = array();
    $link[] = array('key' => 'page', 'value' => null);
    $page_index = get_index($link, "page");

    if (isset($_GET['user_id']))
    {
        // value getted
        $user_id = $_GET['user_id'];
        // commmon value for update
        $user_column[] = array('key' => 'custom', 'value' => -1);
        $user_condition[] = array('key' => 'user_id', 'value' => $user_id);
        $column_index = get_index($user_column, 'custom');

        // update user statut
        $user_column[$column_index]['key'] = 'u_statut';
        $update_user = update_table('user', $user_column, $user_condition);

        // update comment
        $user_column[$column_index]['key'] = 'c_statut';
        $update_user = update_table('comment', $user_column, $user_condition);

        // update subject
        $user_column[$column_index]['key'] = 's_statut';
        $update_user = update_table('forum_subject', $user_column, $user_condition);

        // header to user_management
        $link[$page_index]['value'] = 'user_management.php';
        header('Location: ' . navigation_link($link));
    }
?>