<?php 
    require('../inc/function.php');
    session_start();

    // values getted
    $content = $_POST['c_content'];
    $user_id = $_SESSION['current_user']['user_id'];
    $subject_id = $_POST['subject_id'];
    $c_date = get_current_date()['date_now'];

    // naviagtion link
    $link_comment = array();
    $link_comment[] = array('key' => 'page', 'value' => "comment.php");
    $link_comment[] = array('key' => 'subject_id', 'value' => $subject_id);

    // insert values
    $value = array();
    $value[] = array('key' => 'c_content', 'value' => $content);
    $value[] = array('key' => 'user_id', 'value' => $user_id);
    $value[] = array('key' => 'subject_id', 'value' => $subject_id);
    $value[] = array('key' => 'c_date', 'value' => $c_date);
    $value[] = array('key' => 'c_statut', 'value' => 0);
    // insert values in tables comment
    insert_table("comment", $value);

    // header to comment.php page
    header('Location: ' . navigation_link($link_comment));
?>