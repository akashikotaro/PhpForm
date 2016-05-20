<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style2.css">
    </head>
    <body>
        <form action="result2.php" method="post">

            <h1>お問い合わせ</h1>

            <div class = main>

                <div class ="menu">姓</div>
                <div class = require>必須</div>
                <div class ="input"><input type="text" name="surname" size=12 placeholder="例） 問合" required></div>


                <div class ="clear"></div>


                <div class ="menu">名</div>
                <div class = require>必須</div>
                <div class ="input"><input type="text" name="name" size=12 placeholder="例） 太郎" required></div>


                <div class ="clear"></div>


                <div class ="menu">性別</div>
                <div class="input">
                    <label><input type="radio" name="gender" size=12 value=1 checked="true" required> 男性</lebel>
                    <label><input type="radio" name="gender" size=12 value=2 required> 女性</label>
                    <label><input type="radio" name="gender" size=12 value=3 required> その他</label>
                </div>

                <div class ="clear"></div>


                <div class ="menu">住所</div>
                <div class = require>必須</div>
                <div class ="input">
                    <input type="text" name="address" size=30 placeholder="例） 東京都 問合市 問合1-1"　required>
                </div>

                <div class ="clear"></div>


                <div class ="menu">電話番号</div>
                <div class = require>必須</div>
                <div class="input">
                    <input type="text" name="tel1" size=4 maxlength="4" onKeyup="this.value=this.value.replace(/[^0-9]+/i,'')" placeholder="例） 000" required> -
                    <input type="text" name="tel2" size=4 maxlength="4" onKeyup="this.value=this.value.replace(/[^0-9]+/i,'')" placeholder="   0000" required> -
                    <input type="text" name="tel3" size=4 maxlength="4" onKeyup="this.value=this.value.replace(/[^0-9]+/i,'')" placeholder="   0000"required>
                </div>


                <div class ="clear"></div>


                <div class ="menu">メールアドレス</div>
                <div class = require>必須</div>
                <div class="input">
                    <input type="text" name="email1" size=12 onKeyup="this.value=this.value.replace(/[^0-9a-z]+/i,'')" placeholder="例） toiawase" required> @
                    <input type="text" name="email2" size=12 onKeyup="this.value=this.value.replace(/[^0-9a-z]+/i,'')" placeholder=" toiawase.co.jp" required>
                </div>


                <div class ="clear"></div>


                <div class ="menu">どこでこの製品を<br/>知りましたか？</div>
                <div class = notrequire>複数可</div>
                <div class="input">
                    <input type="hidden" name="check" value=0>
                    <label><input type="checkbox" name="check[]" value=1> 知人、友人から</label><br />
                    <label><input type="checkbox" name="check[]" value=2> 雑誌、チラシから</label><br />
                    <label><input type="checkbox" name="check[]" value=3> サイトから</label>
                </div>


                <div class ="clear"></div>


                <div class ="menu">質問カテゴリ</div>
                <div class = require>必須</div>
                <div class="input">
                    <select name="question">
                        <option value="1">製品について</option>
                        <option value="2">不具合について</option>
                        <option value="3">その他</option>
                    </select>
                </div>


                <div class ="clear"></div>


                <div class ="menu">お問い合わせ内容</div>
                <div class = require>必須</div>
                <div class="input">
                    <textarea name="content" rows=5 cols=50 placeholder="お問い合わせ内容を入力してください" required></textarea>
                </div>

                <div class ="clear"></div>

                <input type="reset" vaule="リセット" class = "btn">
                <input type="submit" value="完了" class = "btn">

            </div>
        </form>
    </body>
</html>
