<?php
foreach ($result->fetch_all(MYSQLI_ASSOC) as $row){


    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $result = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($result);
    if($result->num_rows){
        $turnOut = $row2['msg'];
    }else{
        $turnOut = "No message available";
    }

    (strlen($turnOut) > 28) ? $msg = substr($turnOut,0,28).'...' : $msg = $turnOut;
if(isset($row2['outgoing_msg_id'])){
    ($outgoing_id == $row2['outgoing_msg_id']) ? $you = 'you: ' : $you = "";

}else{
    $you = "";
}

    // USER ONLINE STATUS //

    ($row["status"] == "Offline now") ? $offile = "offline" : $offile = "";
    $output .= ' <a href="chat.php?user_id='.$row["unique_id"].'">
                <div class="content">
                    <img src="storage/'.$row["img"].'" alt="">
                    <div class="details">
                        <span>'.$row["fname"].' '. $row["lname"].'</span>
                       
                        <p>'. $you . $msg .'</p>
                    </div>
                </div>
                <div class="status-dot '.$offile.'"><i class="fas  fa-circle"></i></div>
            </a>';
}
?>