<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form action="result.php" method="post">
            <table border=1>

                <tr>
                    <td class = menu>姓</td>
                    <td>
                        <input type="text" name="surname" size=12>
                    </td>
                </tr>


                <tr>
                    <td class = menu>名</td>
                    <td>
                        <input type="text" name="name" size=12>
                    </td>
                </tr>


                <tr>
                    <td class = menu>性別</td>
                    <td>
                        <input type="radio" name="gender" size=12 value=1 checked="true">男性
                        <input type="radio" name="gender" size=12 value=2>女性
                        <input type="radio" name="gender" size=12 value=3>その他
                    </td>
                </tr>


                <tr>
                    <td class = menu>住所</td>
                    <td>
                        <input type="text" name="address" size=30>
                    </td>
                </tr>


                <tr>
                    <td class = menu>電話番号</td>
                    <td>
                        <input type="text" name="tel1" size=4 maxlength="4" onKeyup="this.value=this.value.replace(/[^0-9a-z]+/i,'')"> -
                        <input type="text" name="tel2" size=4 maxlength="4"> -
                        <input type="text" name="tel3" size=4 maxlength="4">
                    </td>
                </tr>


                <tr>
                    <td class = menu>メールアドレス</td>
                    <td>
                        <input type="text" name="email1" size=12> @
                        <input type="text" name="email2" size=12>
                    </td>
                </tr>


                <tr>
                    <td class = menu>どこでこの製品を<br/>知りましたか？</td>
                    <td>
                        <input type="hidden" name="check" value=0>
                        <input type="checkbox" name="check[]" value=1>知人、友人から<br />
                        <input type="checkbox" name="check[]" value=2>雑誌、チラシから<br />
                        <input type="checkbox" name="check[]" value=3>サイトから
                    </td>
                </tr>


                <tr>
                    <td class = menu>質問カテゴリ</td>
                    <td>
                        <select name="question">
                            <option value="1">製品について</option>
                            <option value="2">不具合について</option>
                            <option value="3">その他</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td class = menu>お問い合わせ内容</td>
                    <td>
                        <textarea name="content" rows=5 cols=40></textarea>
                    </td>
                </tr>


            </table>

            <br />
            <input type="reset" vaule="リセット">
            <input type="submit" value="完了">

        </form>
    </body>
</html>
