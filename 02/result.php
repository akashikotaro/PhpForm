<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

    $genarray = array("男性","女性","その他");
    $checkarray = array("なし","知人、友人から","雑誌、チラシから","サイトから");
    $quearray = array("製品について","不具合について","その他");

    echo "<div class = 'contents'>";
    echo "<table border=1>";
    echo "<caption>お問い合わせ</caption>";

    echo "<tr>";
    echo "<td class = menu>";
    echo "姓名";
    echo "</td>";
    echo "<td>";
    $surname = htmlspecialchars($_POST['surname']);
    $name = htmlspecialchars($_POST['name']);
    echo $surname." ".$name;
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "性別";
    echo "</td>";
    echo "<td>";
    $gender = $_POST['gender'];
    echo $genarray[$gender-1];
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "住所";
    echo "</td>";
    echo "<td>";
    $address = htmlspecialchars($_POST['address']);
    echo $address;
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "電話番号";
    echo "</td>";
    echo "<td>";
    echo $_POST['tel1'];
    echo "-";
    echo $_POST['tel2'];
    echo "-";
    echo $_POST['tel3'];
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "メールアドレス";
    echo "</td>";
    echo "<td>";
    $email1 = htmlspecialchars($_POST['email1']);
    echo $email1;
    echo "@";
    $email2 = htmlspecialchars($_POST['email2']);
    echo $email2;
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "どこでこの製品を<br/>知りましたか？";
    echo "</td>";
    echo "<td>";
    $check = $_POST['check'];
    for($i=0;$i<count($check);$i++){
        echo $checkarray[$check[$i]]."<br />";
    }
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "質問カテゴリ";
    echo "</td>";
    echo "<td>";
    $question = $_POST['question'];
    echo $quearray[$question-1];
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "お問い合わせ内容";
    echo "</td>";
    echo "<td>";
    $content = htmlspecialchars($_POST['content']);
    echo $content;
    echo "</td>";
    echo "</tr>";

    echo "</table>";

    echo "<br /><br />";

    echo "<input type='button' value='戻る' onclick='history.back()'>";

    echo "</div>";

?>

</body>
</html>
