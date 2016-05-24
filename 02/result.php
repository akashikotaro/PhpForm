<<?php
    session_start();
    $content = htmlspecialchars($_POST['content']);
    $pattern="^(\s|　)+$";
    if(!preg_match($pattern,$content)){
        $_SESSION['surname'] = htmlspecialchars($_POST['surname']);
        $_SESSION['name'] = htmlspecialchars($_POST['name']);
        header('Location: contact.php?flag=1');
    }

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">       <!-- CSSの読み込み -->
</head>
<body>
<?php

    $genarray = array("男性","女性","その他");        // 性別の配列
    $checkarray = array("なし","知人、友人から","雑誌、チラシから","サイトから");     // ｢どこで知ったか｣　の選択肢の配列
    $quearray = array("製品について","不具合について","その他");                // 質問カテゴリの選択肢の配列

    echo "<div class = 'contents'>";       // ページ全体の設定
    echo "<table border=1>";               // テーブル 枠線を表示
    echo "<caption>お問い合わせ完了</caption>"; // 見出し

    echo "<tr>";
    echo "<td class = menu>";
    echo "姓名";
    echo "</td>";
    echo "<td>";
    $surname = htmlspecialchars($_POST['surname']);     //　特殊文字をエンティティ文字に変換、htmlタグが送信されても実行させないようにする
    $name = htmlspecialchars($_POST['name']);
    echo $surname." ".$name;    // 姓　名を表示
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "性別";
    echo "</td>";
    echo "<td>";
    $gender = $_POST['gender'];
    echo $genarray[$gender];     // ラジオボタンから受け取ったvalueを使用し、性別の配列から当てはまるものを表示
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "住所";
    echo "</td>";
    echo "<td>";
    $address = htmlspecialchars($_POST['address']);
    echo $address;             // 住所を表示
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "電話番号";
    echo "</td>";
    echo "<td>";
    echo $_POST['tel1'];     //　電話番号を表示
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
    $email1 = htmlspecialchars($_POST['email1']);          //　メールアドレスを表示
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
        echo $checkarray[$check[$i]]."<br />";      // チェックボックスから受け取ったvalueの値を使用し、｢どこで知ったか｣の配列から当てはまるものを表示
    }
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "質問カテゴリ";
    echo "</td>";
    echo "<td>";
    $question = $_POST['question'];
    echo $quearray[$question];       // リストボックスから受け取ったvalueの値を使用し、質問カテゴリの配列から当てはまるものを表示
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "お問い合わせ内容";
    echo "</td>";
    echo "<td>";
    $content = nl2br($content);
    echo $content;
    echo "</td>";
    echo "</tr>";

    echo "</table>";

    echo "<br /><br />";

    echo "<input type='button' value='戻る' onclick='history.back()' class = 'btn'>";     // 戻るボタン

    echo "</div>";

?>

</body>
</html>
