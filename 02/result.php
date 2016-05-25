<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">       <!-- CSSの読み込み -->
    <title>PHP応用課題</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script language="JavaScript">
    myHome="conf.php";
    if (document.referrer.length !=0){ // リンク元がxxxxではない場合
    location.href = myHome; // エラー画面へジャンプ
    }
    </script>
</head>
<body>
<?php

    $genarray = array("男性","女性","その他");        // 性別の配列
    $checkarray = array("なし","知人、友人から","雑誌、チラシから","サイトから");     // ｢どこで知ったか｣　の選択肢の配列
    $quearray = array("製品について","不具合について","その他");                // 質問カテゴリの選択肢の配列

    echo "<div class = 'contents'>";       // ページ全体の設定

    echo "<ul class='bread'>";
    echo "<li><a href='contact.php'>入力画面</a></li>";
    echo "<li><a href='#' onclick='history.back();'>確認画面</a></li>";
    echo "<li>完了画面</li>";
    echo "</ul>";

    echo "<h1 class='cap2'>完了画面</h1>";
    echo "<p class = conp>送信完了しました</p>";
    echo "<a href='contact.php'><input type='button' value='戻る' class = 'btn'></a>";
    echo "</div>";

    $file = "contact_log.txt";
    $current = "";

    if(file_exists($file) === false){
        touch($file);
    }

    //$current = file_get_contents($file);
    date_default_timezone_set('Asia/Tokyo');
    $current .= date("Y/m/d/H:i:s")."\n";
    $current .= "姓名"." ".$_POST['surname']." ".$_POST['name']."\n";
    $current .= "性別"." ".$_POST['gender']."\n";
    $current .= "住所"." ".$_POST['address']."\n";
    $current .= "電話番号"." ".$_POST['tel1']."-".$_POST['tel2']."-".$_POST['tel3']."\n";
    $current .= "メールアドレス"." ".$_POST['email1']."@".$_POST['email2']."\n";
    $current .= "どこで知ったか"." ".$_POST['checkarray']."\n";
    $current .= "質問カテゴリ"." ".$_POST['question']."\n";
    $current .= "問い合わせ内容"."\n".$_POST['content']."\n";
    $current .= "\n";
    file_put_contents($file, $current,FILE_APPEND);

?>

</body>
</html>
