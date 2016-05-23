<html>
<head>
    <link rel='stylesheet' type='text/css' href='style2.css'>
</head>
<body>
<?php

    $genarray = array('男性','女性','その他');
    $checkarray = array('なし','知人、友人から','雑誌、チラシから','サイトから');
    $quearray = array('製品について','不具合について','その他');

    echo "<form>";

    echo "<h1>お問い合わせ</h1>";

    echo "<div class = main>";

    $surname = htmlspecialchars($_POST['surname']);
    $name = htmlspecialchars($_POST['name']);
    echo "<div class ='menu'>姓名</div>";
    echo "<div class ='input'>".$surname."　".$name."</div>";

    echo "<div class ='clear'></div>";

    $gender = $_POST['gender'];
    echo "<div class ='menu'>性別</div>";
    echo "<div class='input'>".$genarray[$gender-1]."</div>";

    echo "<div class ='clear'></div>";

    $address = htmlspecialchars($_POST['address']);
    echo "<div class ='menu'>住所</div>";
    echo "<div class = 'input'>".$address."</div>";

    echo "<div class ='clear'></div>";

    echo "<div class ='menu'>電話番号</div>";
    echo "<div class = 'input'>".$_POST['tel1']."-".$_POST['tel2']."-".$_POST['tel3']."</div>";

    echo "<div class ='clear'></div>";

    echo "<div class ='menu'>メールアドレス</div>";
    echo "<div class='input'>".$_POST['email1']."@".$_POST['email2']."</div>";

    echo "<div class ='clear'></div>";

    $check = $_POST['check'];
    echo "<div class ='menu'>どこでこの製品を<br/>知りましたか？</div>";
    echo "<div class='input'>";
    for($i=0;$i<count($check);$i++){
        echo $checkarray[$check[$i]]."<br />";
    }
    echo "</div>";

    echo "<div class ='clear'></div>";

    $question = $_POST['question'];
    echo "<div class ='menu'>質問カテゴリ</div>";
    echo "<div class='input'>".$quearray[$question-1]."</div>";

    echo "<div class ='clear'></div>";

    $content = htmlspecialchars($_POST['content']);
    echo "<div class ='menu'>お問い合わせ内容</div>";
    echo "<div class='input'>";
    echo "<textarea readonly rows=5 cols=48>";
    echo $content;
    echo "</textarea>";

    echo "<input type='button' value='戻る' onclick='history.back()' class = 'btn'>";

    echo "</div>";

    echo "</form>";


?>
</body>
</html>
