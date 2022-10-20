<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        * {
            border: 0;
            margin: 0;
            box-sizing: border-box;
        }

        #login {
            margin-top: 200px;
            display: flex;
            justify-content: center;
        }

        #login .txtTitle {
            background-color: blue;
            color: white;
            font-size: 24px;
            padding: 12px;
            margin-bottom: 32px;
        }

        #login .box-login {
            border: 1px solid blue;
        }

        #login .col1 {
            text-align: right;
            padding-right: 80px;
            padding-top: 4px;
            padding-bottom: 4px;
            font-size: 20px;
            padding-left: 60px;
            font-weight: bold;
        }

        #login .col2 {
            width: 300px;
        }

        #login .btn {
            background-color: blue;
            color: white;
            padding: 12px 24px;
            margin-top: 24px;
            margin-bottom: 24px;
        }

        input {
            border: 1px solid black;
            border-radius: 5px;
            width: '100%';
            margin: 0 12px;
            padding: 8px 12px;
        }
    </style>
</head>

<body>
    <div id="login">
        <div class="box-login">
            <p class="txtTitle">Đăng Nhập</p>
            <form action="login.php" method="post">
                <table class="table-login">
                    <tr>
                        <td class="col1">Tài khoản :</td>
                        <td class="col2"><input type="text" id="username" name="username"></td>
                    </tr>
                    <tr>
                        <td class="col1">Mật khẩu :</td>
                        <td><input type="password" id="pass" name="pass"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="btn_submit" class="btn" value="Đăng nhập"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <a href="./Register">Đăng ký</a>
                        </td>
                    </tr>

                </table>

            </form>
        </div>
    </div>
</body>

</html>