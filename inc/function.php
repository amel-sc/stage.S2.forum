<?php
    require('connexion.php');
    require("gen_function.php");
    
    // navigation link functions
    // function to create links
    function navigation_link($value)
    {
        $link = 'model.php?';
        for ($i = 0; $i < count($value); $i++)
        {
            if ($i > 0) {
                $link = $link . '&';
            }
    
            $link = $link . $value[$i]['key'] . '=' . $value[$i]['value'];
        }
    
        return $link;
    }
    // function to get the index of one motif in value
    function get_index($value, $key)
    {
        $index = null;
        for ($i = 0; $i < count($value); $i++)
        {
            if ($value[$i]['key'] == $key)
            {
                $index = $i;
            }
        }

        return $index;
    }   




    // function to get comment by forum_subject
    function get_comment_by_subject($subject_id)
    {
        $sql = "SELECT *  FROM comment WHERE subject_id = %s";
        $sql = sprintf($sql, $subject_id);
        $result = array_query($sql); 

        return $result;
    }

?>