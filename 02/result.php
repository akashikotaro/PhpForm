<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

    $flag = 0;
    $flag2 = 0;
    $genarray = array("男性","女性","その他");
    $checkarray = array("知人、友人から","雑誌、チラシから","サイトから");
    $quearray = array("製品について","不具合について","その他");

    echo "<div class = 'contents'>";
    echo "<table border=1>";

    echo "<tr>";
    echo "<td class = menu>";
    echo "姓名";
    echo "</td>";
    echo "<td>";
    if($_POST['surname'] != null && $_POST['name'] != null){
        $surname = htmlspecialchars($_POST['surname']);
        $name = htmlspecialchars($_POST['name']);
        echo $surname." ".$name;
    }else{
        echo "<font color='red'>※姓または名が入力されていません</font>";
        $flag = 1;
    }

    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
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
    echo "<td class = menu>";
    echo "住所";
    echo "</td>";
    echo "<td>";
    if($_POST['address'] != null){
        $address = htmlspecialchars($_POST['address']);
        echo $address;
    }else{
        echo "<font color='red'>※住所が入力されていません</font>";
        $flag = 1;
    }

    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
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
    echo "<td class = menu>";
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
    echo "<td class = menu>";
    echo "どこでこの製品を<br/>知りましたか？";
    echo "</td>";
    echo "<td>";
    if($_POST['check'] != 0){
        $check = $_POST['check'];
        for($i=0;$i<count($check);$i++){
            echo $checkarray[$check[$i]-1]."<br />";
            $flag2 = 1;
        }
    }else{
        echo "無し";
    }

    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
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
    echo "<td class = menu>";
    echo "お問い合わせ内容";
    echo "</td>";
    echo "<td>";
    if($_POST['content'] != null){
        $content = htmlspecialchars($_POST['content']);
        echo $content;
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

    echo "</div>";

?>

</body>
</html>
