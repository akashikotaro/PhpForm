<?php
  $name = htmlspecialchars($_GET['name']);
  echo "<br />";
  if($name != null){
      echo $name."さん "."こんにちは！";
  }else{
      echo "<font color=red>※名前を入力してください</font>";
  }
  echo "<br /><br />";
  echo "<input type='button' value='戻る' onclick='history.back()'>";
?>
