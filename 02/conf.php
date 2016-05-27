<?php

    session_start();
    if($_SESSION['page'] != 0){
        header('location: contact.php');
        exit();
    }

    /* Notice エラーを非表示 */
    error_reporting(E_ALL & ~E_NOTICE);


    $_SESSION['flag'] = 0;  //問い合わせ内容が入力されているかどうかの判定のフラグ

    $genarray = array("男性","女性","その他");        // 性別の配列
    $checkarray = array("なし","知人、友人から","雑誌、チラシから","サイトから");     // ｢どこで知ったか｣　の選択肢の配列
    $quearray = array("製品について","不具合について","その他");                // 質問カテゴリの選択肢の配列


    /* 姓名の入力チェック */
    if(str_replace("  ","",$_POST['surname']) != null  && str_replace(" 　","",$_POST['name']) != null){
        if(preg_match("/^[ぁ-んァ-ヶー一-龠]+$/u",$_POST['surname']) && preg_match("/^[ぁ-んァ-ヶー一-龠]+$/u",$_POST['name'])){
            $surname = htmlspecialchars(str_replace(array(" ", "　"),"",$_POST['surname']));     //　特殊文字をエンティティ文字に変換、htmlタグが送信されても実行させないようにする
            $name = htmlspecialchars(str_replace(array(" ", "　"),"",$_POST['name']));
            $fullname = $surname." ".$name;
        }else{
            $_SESSION['flag'] = 1;
            $fullname = "<font color=red>指定された形式で入力してください</font>";
        }
    }else{
        $_SESSION['flag'] = 1;
        $fullname = "<font color=red>名前を入力してください</font>";
    }



    /* 性別のチェック */
    if(isset($_POST['gender'])){
        $gender = $_POST['gender'];
        $gender2 = $genarray[$gender];
    }else{
        $_SESSION['flag'] = 1;
        $gender2 = "<font color=red>性別を選択してください</font>";
    }


    /* 住所の入力チェック */
    if(trim($_POST['address'], " 　") == true){
        $address = htmlspecialchars(str_replace("  "," ",$_POST['address']));
    }else{
        $_SESSION['flag'] = 1;
        $address = "<font color=red>住所を入力してください</font>";
    }


    /* 電話番号の入力チェック */
    if(str_replace(array(" ", "　"),"",$_POST['tel1']) != null && str_replace(array(" ", "　"),"",$_POST['tel2']) != null && str_replace(array(" ", "　"),"",$_POST['tel3']) != null) {
        if(is_numeric($_POST['tel1']) === true && is_numeric($_POST['tel2']) === true && is_numeric($_POST['tel3']) === true){
            $tel1 = str_replace(array(" ", "　"),"",$_POST['tel1']);
            $tel2 = str_replace(array(" ", "　"),"",$_POST['tel2']);
            $tel3 = str_replace(array(" ", "　"),"",$_POST['tel3']);
            $fulltel = $tel1."-".$tel2."-".$tel3;
        }else{
            $_SESSION['flag'] = 1;
            $fulltel = "<font color=red>指定された形式で入力してください</font>";
        }
    }else{
        $_SESSION['flag'] = 1;
        $fulltel = "<font color=red>電話番号を入力してください<font>";
    }


    /* メールアドレスの入力チェック */
    if(str_replace(array(" ", "　"),"",$_POST['email1']) != null && str_replace(array(" ", "　"),"",$_POST['email2']) != null){
        if(preg_match("/^[a-zA-Z0-9._-]+$/", $_POST['email1']) && preg_match("/^[a-zA-Z0-9._-]+$/", $_POST['email2'])){
            $email1 = htmlspecialchars(str_replace(array(" ", "　"),"",$_POST['email1']));          //　メールアドレスを表示
            $email2 = htmlspecialchars(str_replace(array(" ", "　"),"",$_POST['email2']));

            $domain = strrchr($email2, ".");
            $domain = trim($domain, ".");

            if(strlen($email2) - (strrpos($email2, ".") + 1) < 2 or ctype_alpha($domain) === false){
                $fullemail = "<font color=red>指定された形式で入力してください</font>";
                $_SESSION['flag'] = 1;
            }else{
                $fullemail = $email1."@".$email2;
            }
        }else{
            $fullemail = "<font color=red>指定された形式で入力してください</font>";
            $_SESSION['flag'] = 1;
        }
    }else{
        $fullemail = "<font color=red>メールアドレスを入力してください</font>";
        $_SESSION['flag'] = 1;
    }


    /* チェックボックスのチェック */
    $check = $_POST['check'];
    $checkarray2 = "";
    for($i=0;$i<count($check);$i++){
        $fullcheck .= $checkarray[$check[$i]]."<br />";      // チェックボックスから受け取ったvalueの値を使用し、｢どこで知ったか｣の配列から当てはまるものを表示
        $checkarray2 .= $checkarray[$check[$i]]." ";
    }


    /* 質問カテゴリのチェック */
    if(isset($_POST['question'])){
        $question = $_POST['question'];
        $question2 = $quearray[$question];
    }else{
        $question2 = "<font color=red>質問カテゴリを選択してください</font>";
        $_SESSION['flag'] = 1;
    }


    /* お問い合わせ内容のチェック */
    $content = str_replace("\n\r\n\r","",htmlspecialchars($_POST['content']));  //検索文字列に一致したすべての文字列を置換する
    if(trim($content," 　\n\r") == false){                                       //文字列の先頭および末尾にあるホワイトスペースを取り除く
        $content2 = "<font color=red>お問い合わせ内容を入力してください</font>";
        $_SESSION['flag'] = 1;
    }else{
        $content2 = nl2br($content);        //改行文字の前に HTML の改行タグを挿入する
    }


?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">       <!-- CSSの読み込み -->
    <title>PHP応用課題</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>


    <div class = 'contents'>       <!-- ページ全体の設定 -->

    <ul class='bread'>

        <li><a href="#" onclick="history.back()">入力画面</a></li>
        <li>確認画面</li>

    </ul>

    <table border=1>                <!-- テーブル 枠線を表示 -->

        <caption>お問い合わせ確認画面</caption>   <!-- 見出し -->

        <tr>
            <td class = menu>姓名</td>
            <td class = input><?php echo $fullname; ?></td>
        </tr>


        <tr>
            <td class = menu>性別</td>
            <td class = input><?php echo $gender2; ?></td>
        </tr>


        <tr>
            <td class = menu>住所</td>
            <td class = input><?php echo $address; ?></td>
        </tr>


        <tr>
            <td class = menu>電話番号</td>
            <td class = input><?php echo $fulltel; ?></td>
        </tr>


        <tr>
            <td class = menu>メールアドレス</td>
            <td class = input><?php echo $fullemail; ?></td>
        </tr>


        <tr>
            <td class = menu>どこでこの製品を<br/>知りましたか？</td>
            <td class = input><?php echo $fullcheck; ?></td>
        </tr>


        <tr>
            <td class = menu>質問カテゴリ</td>
            <td class = input><?php echo $question2; ?></td>
        </tr>


        <tr>
            <td class = menu>お問い合わせ内容</td>
            <td class = input><?php echo $content2; ?></td>
        </tr>

    </table>

    <br /><br />

    <?php

        if($_SESSION['flag'] != 1){
            echo "<form action='result.php' method='post'>";

            echo "<input type=hidden name=surname value='$surname'>";
            echo "<input type=hidden name=name value='$name'>";
            echo "<input type=hidden name=gender value='$gender2'>";
            echo "<input type=hidden name=address value='$address'>";
            echo "<input type=hidden name=fulltel value='$fulltel'>";
            echo "<input type=hidden name=fullemail value='$fullemail'>";
            echo "<input type=hidden name=checkarray value='$checkarray2'>";
            echo "<input type=hidden name=question value='$question2'>";
            echo "<input type=hidden name=content value='$content2'>";

            echo "<input type='button' value='戻る' onclick='history.back()' class = 'btn'>";     // 戻るボタン
            echo "<input type='submit' value='送信' class='btn'>";

            echo "</form>";
            $_SESSION['page'] = 1;
        }else{
            echo "<input type='button' value='戻る' onclick='history.back()' class = 'btn'>";     // 戻るボタン
        }

    ?>

    </div>


</body>
</html>
