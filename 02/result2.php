<html>
<head>
    <link rel='stylesheet' type='text/css' href='style2.css'>       <!-- CSSの読み込み -->
</head>
<body>
<?php

    $genarray = array('男性','女性','その他');        // 性別の配列
    $checkarray = array('なし','知人、友人から','雑誌、チラシから','サイトから');     // ｢どこで知ったか｣　の選択肢の配列
    $quearray = array('製品について','不具合について','その他');                // 質問カテゴリの選択肢の配列

    echo "<div class = 'form_setting'>";       // ページ全体の設定

    echo "<h1>お問い合わせ完了</h1>";               // 見出し

    echo "<div class = main>";

    $surname = htmlspecialchars($_POST['surname']);     //　特殊文字をエンティティ文字に変換、htmlタグが送信されても実行させないようにする
    $name = htmlspecialchars($_POST['name']);
    echo "<div class ='menu'>姓名</div>";
    echo "<div class ='input'>".$surname."　".$name."</div>";    // 姓　名を表示

    echo "<div class ='clear'></div>";                          //　フロートの解除

    $gender = $_POST['gender'];
    echo "<div class ='menu'>性別</div>";
    echo "<div class='input'>".$genarray[$gender]."</div>";     // ラジオボタンから受け取ったvalueを使用し、性別の配列から当てはまるものを表示

    echo "<div class ='clear'></div>";

    $address = htmlspecialchars($_POST['address']);
    echo "<div class ='menu'>住所</div>";
    echo "<div class = 'input'>".$address."</div>";             // 住所を表示

    echo "<div class ='clear'></div>";

    echo "<div class ='menu'>電話番号</div>";
    echo "<div class = 'input'>".$_POST['tel1']."-".$_POST['tel2']."-".$_POST['tel3']."</div>";     //　電話番号を表示

    echo "<div class ='clear'></div>";

    echo "<div class ='menu'>メールアドレス</div>";
    echo "<div class='input'>".$_POST['email1']."@".$_POST['email2']."</div>";          //　メールアドレスを表示

    echo "<div class ='clear'></div>";

    $check = $_POST['check'];
    echo "<div class ='menu'>どこでこの製品を<br/>知りましたか？</div>";
    echo "<div class='input'>";
    for($i=0;$i<count($check);$i++){                            // チェックボックスから受け取ったvalueの値を使用し、｢どこで知ったか｣の配列から当てはまるものを表示
        echo $checkarray[$check[$i]]."<br />";
    }
    echo "</div>";

    echo "<div class ='clear'></div>";

    $question = $_POST['question'];
    echo "<div class ='menu'>質問カテゴリ</div>";
    echo "<div class='input'>".$quearray[$question]."</div>";   // リストボックスから受け取ったvalueの値を使用し、質問カテゴリの配列から当てはまるものを表示

    echo "<div class ='clear'></div>";

    $content = htmlspecialchars($_POST['content']);
    $content = nl2br($content);
    echo "<div class ='menu'>お問い合わせ内容</div>";           // お問い合わせ内容をテキストエリアを使用し、編集不可の状態で表示
    echo "<div class='input'>";
    echo $content;
    echo "</div>";
    echo "<input type='button' value='戻る' onclick='history.back()' class = 'btn2'>";     // 戻るボタン

    echo "</div>";


?>
</body>
</html>
