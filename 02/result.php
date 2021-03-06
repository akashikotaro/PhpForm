<?php

session_start();
if($_SESSION['page'] != 1){
    header('location: contact.php');
    exit();
}

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

?>

    <div class = 'contents'>       <!-- ページ全体の設定 -->

        <ul class='bread'>
            <li>入力画面</a></li>
            <li>確認画面</a></li>
            <li>完了画面</li>
        </ul>

        <h1 class='cap2'>完了画面</h1>
        <p class = conp>送信完了しました</p>
        <a href='contact.php'><input type='button' value='戻る' class = 'btn'></a>

    </div>

    <?php
        error_reporting(E_ALL & ~E_NOTICE);
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
        $current .= "電話番号"." ".$_POST['fulltel']."\n";
        $current .= "メールアドレス"." ".$_POST['fullemail']."\n";
        $current .= "どこで知ったか"." ".$_POST['checkarray']."\n";
        $current .= "質問カテゴリ"." ".$_POST['question']."\n";
        $current .= "問い合わせ内容"."\n".$_POST['content']."\n";
        $current .= "\n";
        file_put_contents($file, $current,FILE_APPEND);

    ?>

</body>
</html>
