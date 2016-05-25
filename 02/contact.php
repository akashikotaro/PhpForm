<?php

    //session_start();

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">       <!-- CSSの読み込み -->
        <title>PHP応用課題</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript">
        var is_note_msg=true;
        window.onbeforeunload = function(event){
          if(is_note_msg){
            event = event || window.event;
          }
        }
        </script>
    </head>
    <body>
        <div class="contents">
        <form action="conf.php" method="post" name=fm onSubmit="is_note_msg=false;">   <!-- フォームデータを result.php へポストメソッドを使用して送信 -->
            <ul class="bread">
            	<li>入力画面</li>
            	<!--<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="..." itemprop="url"><span itemprop="title">ラーメン</span></a></li>
            	<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="..." itemprop="url"><span itemprop="title">竹の塚地域</span></a></li>-->
            </ul>
            <table>         <!-- テーブル -->
                <caption>お問い合わせ</caption>   <!-- テーブルの見出し -->
                <tr>
                    <td class = menu>姓　[全角文字]<div class = require>必須</div></td>
                    <td>
                        <?php
                            //if(empty($_SESSION['surname'])){
                                echo "<input type='text' name='surname' size=12 placeholder='例） 問合' required onKeyup=this.value=this.value.replace(/[^ァ-ンぁ-んａ-ｚＡ-Ｚ一-龥]+/i,'')>";
                            //}else{
                                //echo "<input type='text' value='$_SESSION[surname]' name='surname' size=12 placeholder='例） 問合' required onKeyup=this.value=this.value.replace(/[^ァ-ンぁ-んａ-ｚＡ-Ｚ一-龥]+/i,'')>";
                            //}
                        ?>
                    </td>
                </tr>


                <tr>
                    <td class = menu>名　[全角文字]<div class = require>必須</div></td>
                    <td>
                        <input type="text" name="name" size=12 placeholder="例） 太郎" required onKeyup="this.value=this.value.replace(/[^ァ-ンぁ-んａ-ｚＡ-Ｚ一-龥]+/i,'')">    <!-- 名前を入れるテキストボックス -->
                    </td>
                </tr>


                <tr>
                    <td class = menu>性別</td>
                    <td>
                        <label><input type="radio" name="gender" size=12 value=0 checked="true" required> 男性</lebel>   <!-- 性別のラジオボタン -->
                        <label><input type="radio" name="gender" size=12 value=1 required> 女性</label>
                        <label><input type="radio" name="gender" size=12 value=2 required> その他</label>
                    </td>
                </tr>


                <tr>
                    <td class = menu>住所<div class = require>必須</div></td>
                    <td>
                        <input type="text" name="address" required size=30 placeholder="例） 東京都 問合市 問合1-1" onKeyup="this.value=this.value.replace(/[^ぁ-んａ-ｚＡ-Ｚ一-龥0-9０-９]+/i,'')">     <!-- 住所を入れるテキストボックス -->
                    </td>
                </tr>


                <tr>
                    <td class = menu>電話番号 [半角数字]<div class = require>必須</div></td>
                    <td>
                        <input type="text" name="tel1" size=4 maxlength="4" onKeyup="this.value=this.value.replace(/[^0-9]+/i,'')" placeholder="例） 000" required> - <!-- 電話番号を入れるテキストボックス -->
                        <input type="text" name="tel2" size=4 maxlength="4" onKeyup="this.value=this.value.replace(/[^0-9]+/i,'')" placeholder="   0000" required> - <!-- 1つのテキストボックスには最大4文字分入力できる -->
                        <input type="text" name="tel3" size=4 maxlength="4" onKeyup="this.value=this.value.replace(/[^0-9]+/i,'')" placeholder="   0000"required>    <!--半角数字以外の文字は全て入力できないように設定 -->
                    </td>
                </tr>


                <tr>
                    <td class = menu>メールアドレス<div class = require>必須</div></td>
                    <td>
                        <input type="text" name="email1" size=12 onKeyup="this.value=this.value.replace(/[^0-9a-z._-]+/i,'')" placeholder="例） toiawase" required> @  <!--メールアドレスを入れるテキストボックス -->
                        <input type="text" name="email2" size=12 onKeyup="this.value=this.value.replace(/[^0-9a-z._-]+/i,'')" placeholder=" toiawase.co.jp" required> <!-- 半角英数字以外の文字は全て入力できないように設定 -->
                    </td>
                </tr>


                <tr>
                    <td class = menu>どこでこの製品を<br/>知りましたか？<div class = notrequire>複数可</div></td>
                    <td>
                        <input type="hidden" name="check" value=0>
                        <label><input type="checkbox" name="check[]" value=1> 知人、友人から</label><br />   <!-- チェックボックス。もし何もチェックされていない場合、 0 を送信するように設定 -->
                        <label><input type="checkbox" name="check[]" value=2> 雑誌、チラシから</label><br />
                        <label><input type="checkbox" name="check[]" value=3> サイトから</label>
                    </td>
                </tr>


                <tr>
                    <td class = menu>質問カテゴリ</td>
                    <td>
                        <select name="question">
                            <option value=0>製品について</option>    <!-- リストボックス -->
                            <option value=1>不具合について</option>
                            <option value=2>その他</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td class = menu>お問い合わせ内容<div class = require>必須</div></td>
                    <td>
                        <textarea name="content" rows=5 cols=55 placeholder="お問い合わせ内容を入力してください" required></textarea>   <!-- テキストエリア -->
                    </td>
                </tr>


            </table>

            <br />
            <input type="reset" value="リセット" class = "btn">   <!-- 入力した値を全て削除するリセットボタン -->
            <input type="submit" value="完了" class = "btn">      <!-- submit ボタン -->

        </form>
        </div>
    </body>
</html>
