<?php/*
    session_start();
    $content = htmlspecialchars($_POST['content']);
    $pattern="^(\s|　)+$";
    //if(!mb_ereg_replace($pattern,$content)){
        //$_SESSION['surname'] = htmlspecialchars($_POST['surname']);
        //$_SESSION['name'] = htmlspecialchars($_POST['name']);
        //$_SESSION['gender'] = htmlspecialchars($_POST['gender']);
        header('Location: contact.php?flag=1');
    //}*/

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">       <!-- CSSの読み込み -->
    <title>PHP応用課題</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php

    $genarray = array("男性","女性","その他");        // 性別の配列
    $checkarray = array("なし","知人、友人から","雑誌、チラシから","サイトから");     // ｢どこで知ったか｣　の選択肢の配列
    $quearray = array("製品について","不具合について","その他");                // 質問カテゴリの選択肢の配列

    echo "<div class = 'contents'>";       // ページ全体の設定
    echo "<table border=1>";               // テーブル 枠線を表示
    echo "<caption class='cap2'>お問い合わせ完了</caption>"; // 見出し

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
    $gender2 = $genarray[$gender];
    echo $gender2;     // ラジオボタンから受け取ったvalueを使用し、性別の配列から当てはまるものを表示
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
    $tel1 = $_POST['tel1'];
    echo $tel1;     //　電話番号を表示
    echo "-";
    $tel2 = $_POST['tel2'];
    echo $tel2;
    echo "-";
    $tel3 = $_POST['tel3'];
    echo $tel3;
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
    $checkarray2 = "";
    for($i=0;$i<count($check);$i++){
        echo $checkarray[$check[$i]]."<br />";      // チェックボックスから受け取ったvalueの値を使用し、｢どこで知ったか｣の配列から当てはまるものを表示
        $checkarray2 .= $checkarray[$check[$i]]." ";
    }
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "質問カテゴリ";
    echo "</td>";
    echo "<td>";
    $question = $_POST['question'];
    $question2 = $quearray[$question];
    echo $question2;       // リストボックスから受け取ったvalueの値を使用し、質問カテゴリの配列から当てはまるものを表示
    echo "</td>";
    echo "</tr>";


    echo "<tr>";
    echo "<td class = menu>";
    echo "お問い合わせ内容";
    echo "</td>";
    echo "<td>";
    $content = htmlspecialchars($_POST['content']);
    $content2 = nl2br($content);
    echo $content2;
    echo "</td>";
    echo "</tr>";

    echo "</table>";

    echo "<br /><br />";

    echo "<input type='button' value='戻る' onclick='history.back()' class = 'btn'>";     // 戻るボタン

    echo "</div>";

    $file = "contact_log.txt";
    $current = "";

    if(file_exists($file) === false){
        touch($file);
    }

    //$current = file_get_contents($file);
    date_default_timezone_set('Asia/Tokyo');
    $current .= date("Y/m/d/H:i:s")."\n";
    $current .= "姓名"." ".$surname." ".$name."\n";
    $current .= "性別"." ".$gender2."\n";
    $current .= "住所"." ".$address."\n";
    $current .= "電話番号"." ".$tel1."-".$tel2."-".$tel3."\n";
    $current .= "メールアドレス"." ".$email1."@".$email2."\n";
    $current .= "どこで知ったか"." ".$checkarray2."\n";
    $current .= "質問カテゴリ"." ".$question2."\n";
    $current .= "問い合わせ内容"."\n".$content."\n";
    $current .= "\n";
    file_put_contents($file, $current,FILE_APPEND);

?>

</body>
</html>
