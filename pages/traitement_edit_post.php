<?php
    if (isset($_POST['user_id']))
    {
        $user_id = $_POST['user_id'];
        if (in_array(1, $user_id))
        {
            echo "Found";
        }
        else 
        {
            echo  "Not Found";
        }
    }
?>