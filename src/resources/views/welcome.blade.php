<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thiết bị y tế</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fa;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px 80px;
            height: 100vh;
        }

        .left {
            width: 45%;
        }

        .title {
            font-size: 36px;
            font-weight: bold;
            color: #1a73e8;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .btn-group {
            margin-top: 25px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 16px;
            text-decoration: none;
            margin-right: 15px;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-login {
            background: #1a73e8;
            color: white;
        }

        .btn-login:hover {
            background: #0c56c9;
        }

        .btn-register {
            background: white;
            color: #1a73e8;
            border: 2px solid #1a73e8;
        }

        .btn-register:hover {
            background: #e8f0fe;
        }

        .right img {
            width: 520px;
            animation: float 5s ease-in-out infinite;
        }

        /* Ảnh lơ lửng */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="left">
        <div class="title">Website quản lý thiết bị y tế</div>
        <div class="subtitle">
            Giải pháp giúp quản lý hỏng hóc, theo dõi thiết bị, báo cáo nhanh chóng dành cho:
            <br><br>
            ➤ Nhân viên sử dụng thiết bị<br>
            ➤ Kỹ thuật viên<br>
            ➤ Ban giám đốc
        </div>

        <div class="btn-group">
            <a href="/login" class="btn btn-login">Đăng nhập</a>
            <a href="/register" class="btn btn-register">Đăng ký</a>
        </div>
    </div>

    <div class="right">
        <img src="https://laravel.com/img/logomark.min.svg">
    </div>

</div>

</body>
</html>
