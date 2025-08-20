<?php
    require('../inc/function.php');
    session_start();
    // naviagation link
    $link = array();
    $link[] = array('key' => 'page', 'value' => null);
    $page_index = get_index($link, "page");

    $subject_id = $_POST['subject_id'];
    $index_pagination = $_SESSION['index_pagination_post'];

    // condition if no user is restricted or else
    if (isset($_POST['user_id']))
    {
        foreach ($_POST['user_id'] as $user_permission)
        {
            // separated user_id and permission
            $user_permission = explode("-", $user_permission);
            // verifie if permission already exist (update/insert)
            $permission = get_post_permission($user_permission[0], $subject_id);
            if ($permission != null)
            {
                // update columns
                $column = [];
                $column[] = array('key' => 'p_statut', 'value' => $user_permission[1]);
                // update conditions
                $condition = [];
                $condition[] = array('key' => 'subject_id', 'value' => $subject_id);
                $condition[] = array('key' => 'user_id', 'value' => $user_permission[0]);
                // update execute
                $update = update_table('post_permission', $column, $condition);
            }
            else 
            {
                // insert columns
                $column = [];
                $column[] = array('key' => 'subject_id', 'value' => $subject_id);
                $column[] = array('key' => 'user_id', 'value' => $user_permission[0]);
                $column[] = array('key' => 'p_statut', 'value' => $user_permission[1]);
                // insert execute
                $insert = insert_table('post_permission', $column);
            }
        }

        // header to edit_post
        $link[] = array('key' => 'subject_id', 'value' => $subject_id);
        $link[] = array('key' => 'index_pagination_post', 'value' => $index_pagination);
        $link[$page_index]['value'] = 'edit_post.php';
        header('Location: ' . navigation_link($link));
    }
    
    else 
    {
        // header to edit_post
        $link[] = array('key' => 'subject_id', 'value' => $subject_id);
        $link[] = array('key' => 'index_pagination_post', 'value' => $index_pagination);
        $link[$page_index]['value'] = 'edit_post.php';
        header('Location: ' . navigation_link($link));
    }
?>