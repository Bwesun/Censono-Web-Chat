<?php
//chats
session_start();

include('connect.php');

if(!isset($_SESSION['user_id']))
{
    header("location:login.php");
}

$to_user_id=$_GET['id'];
$from_user_id=$_SESSION['user_id'];

$idcheck=$_SESSION['user_id'];
if($to_user_id==$idcheck){
    echo "<script>alert('Sorry! You cannot Chat with Yourself!')</script>";
    echo "<script>window.open('games/index.php','_self')</script>";
}


include('heading.php');
echo "<hr>";

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
        echo "<script>alert('Please type a message to send')</script>";
    }
    else{

    $sql3="INSERT INTO chat_message(to_user_id, from_user_id, chat_message, name, timestamp)VALUES('$to_user_id', '$from_user_id', '$message', '$from_username','$current_timestamp')";
    $result3=mysql_query($sql3);

    $sql4="INSERT INTO msg_notifications(to_user_id, from_user_id, from_username)VALUES('$to_user_id', '$from_user_id', '$from_username') ";
    $result4=mysql_query($sql4);

    $sql5="INSERT INTO all_msg_notifications(to_user_id, from_user_id, from_username, timestamp)VALUES('$to_user_id', '$from_user_id', '$from_username', '$current_timestamp') ";
    $result5=mysql_query($sql5);
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
.row:after, .row:before {
  content: " ";
  display: table;
  clear: both;
}
.span6 {
  float: left;
  width: ;
  padding: 1%;
}
.emojionearea-editor:not(.inline) {
  min-height: 8em!important;
}
    </style>
    <head>
        <title>Chat with <?php echo "$to_username";  ?></title>
    <link rel="stylesheet" type="text/css" href="emojionearea/dist/emojionearea.css">
    </head>
    <div>
    <h3>Chat with <?php echo "$to_username"; ?></h3> 
    <div class="chat_box table">

    <div class="send_message">
            <table width="100%">
            <form method="post">
                <tr>
                    <td align="">
 <div class="rjow">
  <div class="spak6">
  <textarea id="emojionearea1" class="chat_message form-control" name="message"></textarea>
  </div>
</div>
    
  
                   
                        
                        <input type="hidden" name="from_username" value="<?php echo "$from_username";  ?>">
                        <input type="hidden" name="to_user_id" value="<?php echo "$to_user_id";  ?>">
                        <input type="hidden" name="from_user_id" value="<?php echo "$from_user_id";  ?>">
                        <button type="submit" name="send" class="btn btn-default"><span class="glyphicon glyphicon-send"></span>     Send</button>

            </form>
                        <br>
                        <form class="form-group" method="post" enctype="multipart/form-data">Upload Image:
                            <input type="file" name="pic" class="form-control">
                            <button type="submit" name="pic_send" class="btn btn-default"><span class="glyphicon glyphicon-picture"></span>     Send</button>
                        </form>
                        <?php
                        if(isset($_POST['pic_send'])){
                            $pic=$_POST['pic'];
    $date=date("d/m/y");
    $pic=$_POST['pic'];
        $filename2=$_FILES['pic']['name'];
        move_uploaded_file($_FILES['pic']['tmp_name'], "msgimages/".$_FILES['pic']['name']);

    if($filename2==''){
        echo "<script>alert('Pleae, select a picture!')</script>";
    }else{
        $sql6="INSERT INTO chat_message(to_user_id, from_user_id, chat_message, name, timestamp, type)VALUES('$to_user_id', '$from_user_id', '$filename2', '$from_username','$current_timestamp', 'img') ";
        $result6=mysql_query($sql6);

    echo "<script>alert('Picture uploaded Successfully!')</script>";
    }

                            $sql7="INSERT INTO msg_notifications(to_user_id, from_user_id, from_username)VALUES('$to_user_id', '$from_user_id', '$from_username') ";
                            $result7=mysql_query($sql7);

                            $sql8="INSERT INTO all_msg_notifications(to_user_id, from_user_id, from_username, timestamp)VALUES('$to_user_id', '$from_user_id', '$from_username', '$current_timestamp') ";
                            $result8=mysql_query($sql8);

                        }
                        ?>

                        
                    </td>
                </tr>
                
            </table>
        </div>

<script type="text/javascript" language="javascript" src="emojionearea/dist/emojionearea.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#emojionearea1").emojioneArea({
    pickerPosition: "bottom",
    tonesStyle: "bullet"
    });
});
</script>

<table width="100%">
    <tr>

        <td><a href="" onclick="goBack()" id="detailed" class="btn btn-default btn-info" role="link"><span class="glyphicon glyphicon-arrow-left"></span> </button>
</td>
        <td><a href="#" id="detailed" class="btn btn-default btn-info" role="link"><span class="glyphicon glyphicon-refresh"></span> </a>
</td>
    </tr>
</table>
<div id="main" class="message">

        <table width="95%">
        <?php
        
        $sql="SELECT * FROM chat_message WHERE to_user_id='$to_user_id' AND from_user_id='$from_user_id' OR to_user_id='$from_user_id' AND from_user_id='$to_user_id' ORDER BY chat_message_id DESC LIMIT 0,15";
        $result=mysql_query($sql);


$qry="SELECT * FROM users WHERE user_id='$to_user_id' ";
        $res=mysql_query($qry);
        $rw=mysql_fetch_assoc($res);
        $to_user_pic=$rw['pic'];
        $my=$_SESSION['pic'];

        while ($rows=mysql_fetch_assoc($result)) {
            $u_name=$rows['name'];
            $type=$rows['type'];

            if($u_name==$from_username){
                $rows['name']='You';
                echo "
                <tr align='right'>
                    <td align='right' bgcolor='#EEEEEE' id='tds'><h5><span id='name'>".$rows['name']."</span><img class='img-circle' width='40' src='images/".$my."'><br>
                    
                ";
            }
            else{
                echo "
                <tr align='left'>
                    
                    <td align='left' bgcolor='#FFFFCC' id='tds'><h5><img class='img-circle' width='40' src='images/".$to_user_pic."'><span id='name'>".$rows['name']."</span><br>
                ";
            }
            ?>  
                <?php
                if($type=='img'){
                    echo" <img src='msgimages/".$rows['chat_message']."' width='200' class='img-thumbnail img-responsive'>";
                }else{
                    echo $rows['chat_message'];
                }
                ?>
                <i>(<?php echo $rows['timestamp']; ?>)</i>
                 </h5></td>
            </tr>
            <?php
        }
        $sql2="DELETE FROM msg_notifications WHERE to_user_id='$from_user_id' AND from_user_id='$to_user_id' ";
        $sql2=mysql_query($sql2);
        ?>
        </table>
</div>



    </div>
    <table width="100%">
        <tr>
            <td align="left"><a href="messages.php" class="btn btn-default btn-info" align="left"><span class="glyphicon glyphicon-arrow-left"></span> Previous Page</a></td>
        </tr>
    </table>  </span>
</div>
</div>

<script type="text/javascript">
            function goBack(){
                window.history.back();
            }
</script>

