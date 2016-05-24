<html>
    <head>
        <link rel='stylesheet' type='text/css' href='style2.css'>   <!-- CSSの読み込み -->
    </head>
    <body>

        <form action='result2.php' method='post' class = 'form_setting'>   <!-- フォームデータを result.php へポストメソッドを使用して送信 -->


            <h1>お問い合わせ</h1>     <!-- 見出し -->

            <div class = main>     <!-- 入力フォーム　-->

                <div class ='menu'>姓</div>
                <div class = require>必須</div>
                <div class ='input'><input type='text' name='surname' size=12 placeholder=' 例) 問合' required onKeyup="this.value=this.value.replace(/[^ァ-ンぁ-んａ-ｚＡ-Ｚ一-龥]+/i,'')"></div>  <!-- 苗字を入れるテキストボックス
                                                                                                                       タグの属性に requared を使用し、この中身が空白の場合、
                                                                                                                       submit ボタンを押したときに画面上で入力を促すメッセージが表示される -->



                <div class ='clear'></div>     <!-- class require で設定していたフロートの解除 -->


                <div class ='menu'>名</div>
                <div class = require>必須</div>
                <div class ='input'><input type='text' name='name' size=12 placeholder=' 例) 太郎' required　 onKeyup="this.value=this.value.replace(/[^ァ-ンぁ-んａ-ｚＡ-Ｚ一-龥]+/i,'')"></div>    <!-- 名前を入れるテキストボックス -->


                <div class ='clear'></div>


                <div class ='menu'>性別</div>
                <div class='input'>
                    <label><input type='radio' name='gender' size=12 value=0 checked='true' required> 男性</lebel>    <!-- 性別のラジオボタン -->
                    <label><input type='radio' name='gender' size=12 value=1 required> 女性</label>
                    <label><input type='radio' name='gender' size=12 value=2 required> その他</label>
                </div>

                <div class ='clear'></div>


                <div class ='menu'>住所</div>
                <div class = require>必須</div>
                <div class ='input'>
                    <input type='text' name='address' size=30 placeholder=' 例) 東京都 問合市 問合1-1'　required onKeyup="this.value=this.value.replace(/[^ぁ-んａ-ｚＡ-Ｚ一-龥0-9０-９]+/i,'')">     <!-- 住所を入れるテキストボックス -->
                </div>

                <div class ='clear'></div>


                <div class ='menu'>電話番号</div>
                <div class = require>必須</div>
                <div class='input'>
                    <input type="text" name="tel1" size=4 maxlength="4" onKeyup="this.value=this.value.replace(/[^0-9]+/i,'')" placeholder="例)000" required> -   <!-- 電話番号を入れるテキストボックス -->
                    <input type="text" name="tel2" size=4 maxlength="4" onKeyup="this.value=this.value.replace(/[^0-9]+/i,'')" placeholder=" 0000" required> -    <!-- 1つのテキストボックスには最大4文字分入力できる -->
                    <input type="text" name="tel3" size=4 maxlength="4" onKeyup="this.value=this.value.replace(/[^0-9]+/i,'')" placeholder=" 0000" required>       <!--半角数字以外の文字は全て入力できないように設定 -->
                </div>


                <div class ='clear'></div>


                <div class ='menu'>メールアドレス</div>
                <div class = require>必須</div>
                <div class='input'>
                    <input type='text' name='email1' size=12 onKeyup="this.value=this.value.replace(/[^0-9a-z._-]+/i,'')" placeholder=' 例) toiawase' required> @   <!--メールアドレスを入れるテキストボックス -->
                    <input type='text' name='email2' size=12 onKeyup="this.value=this.value.replace(/[^0-9a-z._-]+/i,'')" placeholder=' toiawase.co.jp' required>   <!-- 半角英数字以外の文字は全て入力できないように設定 -->
                </div>


                <div class ='clear'></div>


                <div class ='menu'>どこでこの製品を<br/>知りましたか？</div>
                <div class = notrequire>複数可</div>
                <div class='input'>
                    <input type='hidden' name='check' value=0>
                    <label><input type='checkbox' name='check[]' value=1> 知人、友人から</label><br />     <!-- チェックボックス。もし何もチェックされていない場合、 0 を送信するように設定 -->
                    <label><input type='checkbox' name='check[]' value=2> 雑誌、チラシから</label><br />
                    <label><input type='checkbox' name='check[]' value=3> サイトから</label>
                </div>


                <div class ='clear'></div>


                <div class ='menu'>質問カテゴリ</div>
                <div class = require>必須</div>
                <div class='input'>
                    <select name='question'>
                        <option value=0>製品について</option>       <!-- リストボックス -->
                        <option value=1>不具合について</option>
                        <option value=2>その他</option>
                    </select>
                </div>


                <div class ='clear'></div>


                <div class ='menu'>お問い合わせ内容</div>
                <div class = require>必須</div>
                <div class='input'>
                    <textarea name='content' rows=6 cols=45 placeholder=' お問い合わせ内容を入力してください' required></textarea>   <!-- テキストエリア -->
                </div>

                <div class ='clear'></div>

                <input type='reset' vaule='リセット' class = 'btn'>     <!-- 入力した値を全て削除するリセットボタン -->
                <input type='submit' value='完了' class = 'btn'>      <!-- submit ボタン -->

            </div>
        </form>
    </body>
</html>
