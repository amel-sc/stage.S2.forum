<?php
    require('../inc/function.php');
    session_start();
    // naviagation link
    $link = array();
    $link[] = array('key' => 'page', 'value' => null);
    $page_index = get_index($link, "page");

    if (isset($_GET['edit_post']))
    {
        $subject_id = $_GET['subject_id'];
        $index_pagination = $_SESSION['index_pagination_post'];
        $search = $_GET['search'];
    
        $link[] = array('key' => 'search', 'value' => $search);
        $link[] = array('key' => 'index_pagination_post', 'value' => $index_pagination);
        $link[] = array('key' => 'subject_id', 'value' => $subject_id);
        $link[$page_index]['value'] = 'edit_post.php';
    
        header('Location: ' . navigation_link($link));
    }

    else
    {
        
        $index_pagination = $_SESSION['index_pagination'];
        $user_statut = $_SESSION['user_statut'];
        $search = $_GET['search'];

        $link[] = array('key' => 'search', 'value' => $search);
        $link[] = array('key' => 'index_pagination', 'value' => $index_pagination);
        $link[] = array('key' => 'user_statut', 'value' => $user_statut);
        $link[$page_index]['value'] = 'user_management.php';
    
        header('Location: ' . navigation_link($link));
    }
?>