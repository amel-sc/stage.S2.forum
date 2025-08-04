<?php
    require('../inc/function.php');
    session_start();
    // verification
    if (isset($_POST['s_title'])) 
    {
        $title = $_POST['s_title'];
        $content = $_POST['s_content'];
        // media condition
        $media = $_FILES['s_media']['name'];
        if ($media == "")
        {
            $media = "empty";
        }
        else 
        {
            $media = upload_image_video($_FILES['s_media']);
        }
        $user_id = $_SESSION['current_user']['user_id'];
        $s_date = get_current_date()['date_now'];

        // naviagtion link
        $link = array();
        $link[] = array('key' => 'page', 'value' => "home.php");

        // insert values
        $value = array();
        $value[] = array('key' => 's_content', 'value' => $content);
        $value[] = array('key' => 'user_id', 'value' => $user_id);
        $value[] = array('key' => 's_title', 'value' => $title);
        $value[] = array('key' => 's_date', 'value' => $s_date);
        $value[] = array('key' => 's_media', 'value' => $media);
        // insert values in tables comment
        insert_table("forum_subject", $value);

        // header to comment.php page
        header('Location: ' . navigation_link($link));
    }
?>