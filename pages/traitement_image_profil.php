<?php
    require('../inc/function.php');
    session_start();
    // naviagation link
    $link = array();
    $link[] = array('key' => 'page', 'value' => null);
    $page_index = get_index($link, "page");

    if(isset($_POST['user_id']))
    {
        $user_id = $_POST['user_id'];
        //update values
        $image = upload_image($_FILES["image"]);
        $column = array();
        $column[] = array('key' => 'u_image', 'value' => $image);
        // update condition
        $condition = array();
        $condition[] = array('key' => 'user_id', 'value' => $user_id);
        // update to table user
        $update_user = update_table("user", $column, $condition);
        
        // redirect to edit_profile page
        $link[] = array('key' => 'user_id', 'value' => $user_id);
        $link[$page_index]['value'] = 'edit_profile.php';
        header('Location: ' . navigation_link($link));
    }

    else 
    {
        if (isset($_FILES['image']))
        {
            $user_id = $_SESSION['current_user']['user_id'];
            //update values
            $image = upload_image($_FILES["image"]);
            $column = array();
            $column[] = array('key' => 'u_image', 'value' => $image);
            // update condition
            $condition = array();
            $condition[] = array('key' => 'user_id', 'value' => $user_id);
            // update to table user
            $update_user = update_table("user", $column, $condition);
    
            // redirect to profile page
            $link[$page_index]['value'] = 'profile.php';
            header('Location: ' . navigation_link($link));
        }
    }
?>