<?php
    require_once("database.php");
    //post message
    if(isset($_POST&#91;'message'&#93;)){
        $message = mysqli_real_escape_string($con, $_POST&#91;'message'&#93;);
        $conversation_id = mysqli_real_escape_string($con, $_POST&#91;'conversation_id'&#93;);
        $user_form = mysqli_real_escape_string($con, $_POST&#91;'user_form'&#93;);
        $user_to = mysqli_real_escape_string($con, $_POST&#91;'user_to'&#93;);
 
        //decrypt the conversation_id,user_from,user_to
        $conversation_id = base64_decode($conversation_id);
        $user_form = base64_decode($user_form);
        $user_to = base64_decode($user_to);
 
        //insert into `messages`
        $q = mysqli_query($con, "INSERT INTO `messages` VALUES ('','$conversation_id','$user_form','$user_to','$message')");
        if($q){
            echo "Posted";
        }else{
            echo "Error";
        }
    }
?>