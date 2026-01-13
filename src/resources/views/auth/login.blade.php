<!-- <!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập hệ thống</h2>

    <form method="POST" action="/login">
        @csrf
        <label>Email</label>
        <input type="email" name="email" required><br>

        <label>Mật khẩu</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Đăng nhập</button>
    </form>

    @if ($errors->any())
        <p style="color:red">{{ $errors->first() }}</p>
    @endif
</body>
</html> -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            background: linear-gradient(135deg, #2E3192, #1BFFFF);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 380px;
            padding: 40px;
            border-radius: 20px;
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.13);
            box-shadow: 0 8px 32px rgba(0, 0, 0, .3);
            color: #fff;
            text-align: center;
        }

        .login-box h2 {
            font-size: 26px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .input-field {
            width: 100%;
            margin: 12px 0;
            text-align: left;
        }

        .input-field label {
            font-weight: 500;
            font-size: 14px;
        }

        .input-field input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border-radius: 10px;
            border: none;
            outline: none;
            background: rgba(255, 255, 255, 0.3);
            color: #fff;
            font-size: 15px;
        }

        .login-btn {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #00eaff;
            color: #003953;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            font-weight: 600;
            transition: .2s;
        }

        .login-btn:hover {
            background: #fff;
            color: #003953;
        }

        .note {
            margin-top: 15px;
            font-size: 13px;
            opacity: 0.8;
        }

        a {
            color: #00eaff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>

<div class="login-box">
    <h2>Đăng nhập hệ thống</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-field">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="input-field">
            <label>Mật khẩu</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" class="login-btn">Đăng nhập</button>

        <p class="note">Chưa có tài khoản? <a href="{{ url('/register') }}">Đăng ký</a></p>
    </form>
</div>

</body>
</html>
