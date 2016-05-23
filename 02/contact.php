<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">       <!-- CSSの読み込み -->
    </head>
    <body>
        <form action="result.php" method="post">   <!-- フォームデータを result.php へポストメソッドを使用して送信 -->

            <table>         <!-- テーブル -->
                <caption>お問い合わせ</caption>   <!-- テーブルの見出し -->
                <tr>
                    <td class = menu>姓　[全角文字]<div class = require>必須</div></td>
                    <td>
                        <input type="text" name="surname" size=12 placeholder="例） 問合" required>      <!-- 苗字を入れるテキストボックス
                                                                                                       タグの属性に requared を使用し、この中身が空白の場合、
                                                                                                       submit ボタンを押したときに画面上で入力を促すメッセージが表示される -->

                    </td>
                </tr>


                <tr>
                    <td class = menu>名　[全角文字]<div class = require>必須</div></td>
                    <td>
                        <input type="text" name="name" size=12 placeholder="例） 太郎"　required>    <!-- 名前を入れるテキストボックス -->
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
                        <input type="text" name="address" size=30 placeholder="例） 東京都 問合市 問合1-1"　required>     <!-- 住所を入れるテキストボックス -->
                    </td>
                </tr>


                <tr>
                    <td class = menu>電話番号<div class = require>必須</div></td>
                    <td>
                        <input type="text" name="tel1" size=4 maxlength="4" onKeyup="this.value=this.value.replace(/[^0-9]+/i,'')" placeholder="例） 000" required> - <!-- 電話番号を入れるテキストボックス -->
                        <input type="text" name="tel2" size=4 maxlength="4" onKeyup="this.value=this.value.replace(/[^0-9]+/i,'')" placeholder="   0000" required> - <!-- 1つのテキストボックスには最大4文字分入力できる -->
                        <input type="text" name="tel3" size=4 maxlength="4" onKeyup="this.value=this.value.replace(/[^0-9]+/i,'')" placeholder="   0000"required>    <!--半角数字以外の文字は全て入力できないように設定 -->
                    </td>
                </tr>


                <tr>
                    <td class = menu>メールアドレス<div class = require>必須</div></td>
                    <td>
                        <input type="text" name="email1" size=12 onKeyup="this.value=this.value.replace(/[^0-9a-z]+/i,'')" placeholder="例） toiawase" required> @  <!--メールアドレスを入れるテキストボックス -->
                        <input type="text" name="email2" size=12 onKeyup="this.value=this.value.replace(/[^0-9a-z]+/i,'')" placeholder=" toiawase.co.jp" required> <!-- 半角英数字以外の文字は全て入力できないように設定 -->
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
            <input type="reset" vaule="リセット" class = "btn">     <!-- 入力した値を全て削除するリセットボタン -->
            <input type="submit" value="完了" class = "btn">      <!-- submit ボタン -->

        </form>
    </body>
</html>
