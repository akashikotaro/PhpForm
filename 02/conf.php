<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">       <!-- CSSの読み込み -->
    <title>PHP応用課題</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>

<?php

    $flag = 0;  //問い合わせないようが入力されているかどうかの判定のフラグ

    $genarray = array("男性","女性","その他");        // 性別の配列
    $checkarray = array("なし","知人、友人から","雑誌、チラシから","サイトから");     // ｢どこで知ったか｣　の選択肢の配列
    $quearray = array("製品について","不具合について","その他");                // 質問カテゴリの選択肢の配列
?>



    <div class = 'contents'>       <!-- ページ全体の設定 -->

    <ul class='bread'>

        <li><a href="#" onclick="history.back()">入力画面</a></li>
        <li>確認画面</li>

    </ul>

    <table border=1>                <!-- テーブル 枠線を表示 -->

        <caption>お問い合わせ確認画面</caption>   <!-- 見出し -->

        <tr>
            <td class = menu>姓名</td>
            <td class = input>

            <?php
                if(str_replace("  ","",$_POST['surname']) != null  && str_replace(" 　","",$_POST['name']) != null){
                    if(preg_match("/^[ぁ-んァ-ヶー一-龠]+$/u",$_POST['surname']) && preg_match("/^[ぁ-んァ-ヶー一-龠]+$/u",$_POST['name'])){
                        $surname = htmlspecialchars(str_replace(array(" ", "　"),"",$_POST['surname']));     //　特殊文字をエンティティ文字に変換、htmlタグが送信されても実行させないようにする
                        $name = htmlspecialchars(str_replace(array(" ", "　"),"",$_POST['name']));
                        echo $surname." ".$name;    // 姓　名を表示
                    }else{
                        echo "<font color=red>名前を入力してください</font>";
                        $flag = 1;
                    }
                }else{
                    echo "<font color=red>名前を入力してください</font>";
                    $flag = 1;
                }

            ?>

            </td>
        </tr>


        <tr>
            <td class = menu>性別</td>
            <td class = input>

            <?php

                if(isset($_POST['gender'])){
                    $gender = $_POST['gender'];
                    $gender2 = $genarray[$gender];
                    echo $gender2;     // ラジオボタンから受け取ったvalueを使用し、性別の配列から当てはまるものを表示
                }else{
                    echo "<font colo=red>性別を選択してください</font>";
                    $flag = 1;
                }

            ?>

            </td>
        </tr>


        <tr>
            <td class = menu>住所</td>
            <td class = input>

            <?php

                if(trim($_POST['address'], " 　") == true){
                    $address = htmlspecialchars($_POST['address']);
                    echo $address;             // 住所を表示
                }else{
                    echo "<font color=red>住所を入力してください</font>";
                    $flag = 1;
                }

             ?>

            </td>
        </tr>


        <tr>
            <td class = menu>電話番号</td>
            <td class = input>

            <?php

                if(str_replace(array(" ", "　"),"",$_POST['tel1']) != null && str_replace(array(" ", "　"),"",$_POST['tel2']) != null && str_replace(array(" ", "　"),"",$_POST['tel3']) != null) {
                    if(is_numeric($_POST['tel1']) === true && is_numeric($_POST['tel2']) === true && is_numeric($_POST['tel3']) === true){
                        $tel1 = str_replace(array(" ", "　"),"",$_POST['tel1']);
                        echo $tel1;     //　電話番号を表示
                        echo "-";
                        $tel2 = str_replace(array(" ", "　"),"",$_POST['tel2']);
                        echo $tel2;
                        echo "-";
                        $tel3 = str_replace(array(" ", "　"),"",$_POST['tel3']);
                        echo $tel3;
                    }else{
                        echo "<font color=red>電話番号を入力してください</font>";
                        $flag = 1;
                    }
                }else{
                    echo "<font color=red>電話番号を入力してください</font>";
                    $flag = 1;
                }

            ?>

            </td>
        </tr>


        <tr>
            <td class = menu>メールアドレス</td>
            <td class = input>

            <?php

                if(str_replace(array(" ", "　"),"",$_POST['email1']) != null && str_replace(array(" ", "　"),"",$_POST['email2']) != null){
                    $email1 = htmlspecialchars(str_replace(array(" ", "　"),"",$_POST['email1']));          //　メールアドレスを表示
                    echo $email1;
                    echo "@";
                    $email2 = htmlspecialchars(str_replace(array(" ", "　"),"",$_POST['email2']));
                    echo $email2;
                }else{
                    echo "<font color=red>メールアドレスを入力してください</font>";
                    $flag = 1;
                }

            ?>

            </td>
        </tr>


        <tr>
            <td class = menu>どこでこの製品を<br/>知りましたか？</td>
            <td class = input>

            <?php

                $check = $_POST['check'];
                $checkarray2 = "";
                for($i=0;$i<count($check);$i++){
                    echo $checkarray[$check[$i]]."<br />";      // チェックボックスから受け取ったvalueの値を使用し、｢どこで知ったか｣の配列から当てはまるものを表示
                    $checkarray2 .= $checkarray[$check[$i]]." ";
                }

            ?>

            </td>
        </tr>


        <tr>
            <td class = menu>質問カテゴリ</td>
            <td class = input>

            <?php

                if(isset($_POST['question'])){
                    $question = $_POST['question'];
                    $question2 = $quearray[$question];
                    echo $question2;       // リストボックスから受け取ったvalueの値を使用し、質問カテゴリの配列から当てはまるものを表示
                }else{
                    echo "質問カテゴリを選択してください";
                    $flag = 1;
                }

            ?>

            </td>
        </tr>


        <tr>
            <td class = menu>お問い合わせ内容</td>
            <td class = input>

            <?php

                $content = str_replace("\n\r\n\r","",htmlspecialchars($_POST['content']));  //検索文字列に一致したすべての文字列を置換する
                if(trim($content," 　\n\r") == false){                                       //文字列の先頭および末尾にあるホワイトスペースを取り除く
                    echo "<font color=red>お問い合わせ内容を入力してください</font>";
                    $flag = 1;
                }else{
                    $content2 = nl2br($content);        //改行文字の前に HTML の改行タグを挿入する
                    echo $content2;
                }

            ?>

            </td>
        </tr>

    </table>

    <br /><br />

    <?php

        if($flag != 1){
            echo "<form action='result.php' method='post'>";

            echo "<input type=hidden name=surname value='$surname'>";
            echo "<input type=hidden name=name value='$name'>";
            echo "<input type=hidden name=gender value='$gender2'>";
            echo "<input type=hidden name=address value='$address'>";
            echo "<input type=hidden name=tel1 value='$tel1'>";
            echo "<input type=hidden name=tel2 value='$tel2'>";
            echo "<input type=hidden name=tel3 value='$tel3'>";
            echo "<input type=hidden name=email1 value='$email1'>";
            echo "<input type=hidden name=email2 value='$email2'>";
            echo "<input type=hidden name=checkarray value='$checkarray2'>";
            echo "<input type=hidden name=question value='$question2'>";
            echo "<input type=hidden name=content value='$content2'>";

            echo "<input type='button' value='戻る' onclick='history.back()' class = 'btn'>";     // 戻るボタン
            echo "<input type='submit' value='送信' class='btn'>";

            echo "</form>";
        }else{
            echo "<input type='button' value='戻る' onclick='history.back()' class = 'btn'>";     // 戻るボタン
        }

    ?>

    </div>



?>

</body>
</html>
