<html>
<head></head>
<body>
<?php

    $flag = 0;
    $flag2 = 0;
    $genarray = array("男性","女性","その他");
    $checkarray = array("知人、友人から","雑誌、チラシから","サイトから");
    $quearray = array("製品について","不具合について","その他");

    echo "<table>";

    echo "<tr>";
    echo "<td>";
    echo "姓";
    echo "</td>";
    echo "<td>";
    if($_POST['surname'] != null){
        $surname = htmlspecialchars($_POST['surname']);
        echo $surname;
    }else{
        echo "<font color='red'>※姓が入力されていません</font>";
        $flag = 1;
    }

    echo "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>";
    echo "名";
    echo "</td>";
    echo "<td>";
    if($_POST['name'] != null){
        $name = htmlspecialchars($_POST['name']);
        echo $name;
    }else{
        echo "<font color='red'>※名が入力されていません</font>";
        $flag = 1;
    }

    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td>";
    echo "性別";
    echo "</td>";
    echo "<td>";
    if($_POST['gender'] != null){
        $gender = $_POST['gender'];
        echo $genarray[$gender-1];
    }

    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td>";
    echo "住所";
    echo "</td>";
    echo "<td>";
    if($_POST['address'] != null){
        $address = htmlspecialchars($_POST['address']);
    }else{
        echo "<font color='red'>※住所が入力されていません</font>";
        $flag = 1;
    }

    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td>";
    echo "電話番号";
    echo "</td>";
    echo "<td>";
    if($_POST['tel1'] != null && $_POST['tel2'] != null && $_POST['tel3'] != null ){
        echo $_POST['tel1'];
        echo "-";
        echo $_POST['tel2'];
        echo "-";
        echo $_POST['tel3'];
    }else{
        echo "<font color='red'>※電話番号が入力されていません</font>";
        $flag = 1;

    }

    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td>";
    echo "メールアドレス";
    echo "</td>";
    echo "<td>";
    if($_POST['email1'] != null && $_POST['email2'] != null){
        echo $_POST['email1'];
        echo "@";
        echo $_POST['email2'];
    }else{
        echo "<font color='red'>※メールアドレスが入力されていません</font>";
        $flag = 1;
    }

    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td>";
    echo "どこでこの製品を<br/>知りましたか？";
    echo "</td>";
    echo "<td>";
    if($_POST['check'] != 0){
        $check = $_POST['check'];
        for($i=0;$i<count($check);$i++){
            echo $checkarray[$check[$i]-1];
            $flag2 = 1;
        }
    }else{
        echo "無し";
    }

    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td>";
    echo "質問カテゴリ";
    echo "</td>";
    echo "<td>";
    if($_POST['question'] != null){
        $question = $_POST['question'];
        echo $quearray[$question-1];
    }

    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td>";
    echo "お問い合わせ内容";
    echo "</td>";
    echo "<td>";
    if($_POST['content'] != null){
        echo $_POST['content'];
    }else{
        echo "<font color='red'>※お問い合わせ内容が入力されていません</font>";
        $flag = 1;
    }

    echo "</td>";
    echo "</tr>";

    echo "</table>";

    echo "<br /><br />";

    echo "<input type='button' value='戻る' onclick='history.back()'>";

    if($flag == 0){
        echo "<input type='submit' value='完了'>";
    }



?>
