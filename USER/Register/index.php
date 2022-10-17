<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        * {
            border: 0;
            margin: 0;
            box-sizing: border-box;
        }
        #register {
            margin-top: 200px;
            display: flex;
            justify-content: center;
        }
        #register .txtTitle {
            background-color: blue;
            color: white;
            font-size: 24px;
            padding: 12px ;
            margin-bottom: 32px;
        }
        #register .box-register {
            border: 1px solid blue;
            background-color: white;
            border-radius: 16px;
            border-collapse: collapse;
            border: 1px solid blue;
        }
        #register .col1 {
            text-align: right;
            padding-right: 80px;
            padding-top: 4px;
            padding-bottom: 4px;
            font-size: 20px;
            padding-left: 60px;
            font-weight: bold;
        }
        #register .col2 {
            width: 300px;
        }
        #register .btn {
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
        .body {
            background-image: url(../../ASSETS/img/background1.jpg);
        }
    </style>
</head>
<body class="body">
    <div id="register">
        <div class="box-register">
            <p class="txtTitle">Đăng ký thành viên mới</p>
            <form action="register.php" method="post">
                <table class="table-register">	
                    <tr>
                        <td class="col1">Tài khoản :</td>
                        <td class="col2"><input type="text" id="username" name="username"></td>
                    </tr>
                    <tr>
                        <td class="col1">Mật khẩu :</td>
                        <td><input type="password" id="pass" name="pass"></td>
                    </tr>
                    <tr>
                        <td class="col1">Nhập lại mật khẩu :</td>
                        <td><input type="password" id="re_pass" name="re_pass"></td>
                    </tr>
                    <tr>
                        <td class="col1">Họ Tên :</td>
                        <td><input type="text" id="name" name="name"></td>
                    </tr>
                    <tr>
                        <td class="col1">Email :</td>
                        <td><input type="text" id="email" name="email"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="btn_submit" class="btn" value="Đăng ký"></td>
                    </tr>
        
                </table>
                
            </form>
        </div>
    </div>
</body>
</html>