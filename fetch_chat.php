<?php
include('connect.php');
$sql2="SELECT * FROM users WHERE user_id='$to_user_id'";
$result2=mysql_query($sql2);
$row=mysql_fetch_assoc($result2);

$to_username=$row['username'];
$from_username=$_SESSION['username'];


$current_timestamp=date('Y-m-d H-i-s');

if(isset($_POST['send'])){

    $to_user_id=$_POST['to_user_id'];
    $from_user_id=$_POST['from_user_id'];
    $from_username=$_POST['from_username'];
    $message=$_POST['message'];

    if($message==''){
        echo "<script>alert('Type a message to send')</script>";
    }
    else{

    $sql3="INSERT INTO chat_message(to_user_id, from_user_id, chat_message, name, timestamp)VALUES('$to_user_id', '$from_user_id', '$message', '$from_username','$current_timestamp')";
    $result3=mysql_query($sql3);
}

//echo $sql3;
}




?>  
    <style type="text/css">
        .chat_box{
            background-color: white;
            border: 2px solid orange;
            border-radius: 5px;
        }
        i{
            color: #666666;
            font-size: 12px;
        }
        input{
            padding: 10px;
            border-radius: 4px;
            
        }
        .send_message{
            padding: 0px 0px 0px 0px;
            border-radius: 5px;
            width: 95%;
            background-color: white;
            border-top:1px solid orange;
        }
    
        textarea, .btn {
        width: 100%;
        border-radius: 4px;
        opacity: 0.85;
        text-decoration: none; 
        padding-bottom: 3px;
        padding-left: 4px;
        }
        #name{
            color: blue;
            font-weight: bold;
            font-size: 16px;
        }
        .message{
            overflow-y: scroll;
            height: 500px;
            border:2px solid orange;
            border-radius: 5px;
            padding: 5px;
        }
        #tds{
            border-radius: 10px;
            padding: 3px
        }
        #detailed{
            border:1px solid white;
        }
    </style>
    
    <div>
    <h3>Chat with <?php echo "$to_username"; ?></h3> 
    <div class="chat_box table">

    <div class="send_message">
            <table width="100%">
            <form method="post">
                <tr>
                    <td align="center">
                        <textarea name="message" placeholder="Enter Message"></textarea>
                    </td>
                <td>
                        
                        <input type="hidden" name="from_username" value="<?php echo "$from_username";  ?>">
                        <input type="hidden" name="to_user_id" value="<?php echo "$to_user_id";  ?>">
                        <input type="hidden" name="from_user_id" value="<?php echo "$from_user_id";  ?>">
                        <button type="submit" name="send" class="btn btn-default"><span class="glyphicon glyphicon-send"></span>     Send</button>
                    </td>
                </tr>
                
            </table>
            </form>
        </div>

<button href="" id="detailed" class="btn btn-default btn-info" role="submit"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
<div id="main" class="message">

        <table width="95%">
        <?php
        $sql="SELECT * FROM chat_message WHERE to_user_id='$to_user_id' AND from_user_id='$from_user_id' OR to_user_id='$from_user_id' AND from_user_id='$to_user_id' ORDER BY chat_message_id DESC LIMIT 0,15";
        $result=mysql_query($sql);



        while ($rows=mysql_fetch_assoc($result)) {
            $u_name=$rows['name'];

            if($u_name==$from_username){
                $rows['name']='You';
                echo "
                <tr align='right'>
                    <td align='right' bgcolor='#66CCCC' id='tds'><h5><span id='name'>".$rows['name']."</span><br>
                ";
            }
            else{
                echo "
                <tr align='left'>
                    <td align='left' bgcolor='#FFFF99' id='tds'><h5><span id='name'>".$rows['name']."</span><br>
                ";
            }
            ?>  
                <?php echo $rows['chat_message']; ?>
                <i>(<?php echo $rows['timestamp']; ?>)</i>
                 </h5></td>
            </tr>
            <?php
        }
        ?>
        </table>
</div>



    </div>
    <table width="100%">
        <tr>
            <td align="left"><button onclick="goBack()" class="btn btn-default btn-info" align="left"><span class="glyphicon glyphicon-arrow-left"></span> Previous Page</button></td>
        </tr>
    </table>  </span>
</div>
</div>

<script type="text/javascript">
            function goBack(){
                window.history.back();
            }
        </script>