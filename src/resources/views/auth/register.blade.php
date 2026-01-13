<!-- <!DOCTYPE html>
<html>
<head>
    <title>Đăng ký tài khoản</title>
</head>
<body>
    <h2>Tạo tài khoản Nhân viên / Kỹ thuật viên / Ban Giám đốc</h2>

    <form method="POST" action="/register">
        @csrf

        <label>Họ và tên</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email" required><br><br>

        <label>Mật khẩu</label><br>
        <input type="password" name="password" required><br><br>

        <label>Chọn chức vụ</label><br>
        <select name="role" required>
            <option value="staff">Nhân viên (cán bộ sử dụng thiết bị)</option>
            <option value="technician">Kỹ thuật viên (phòng vật tư)</option>
            <option value="director">Ban giám đốc</option>
        </select><br><br>

        <button type="submit">Đăng ký</button>
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
    <title>Đăng ký tài khoản</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 flex items-center justify-center min-h-screen">

    <div class="bg-gray-800 p-10 rounded-2xl shadow-2xl w-[440px] text-white">
        
        <h2 class="text-3xl font-bold mb-6 text-center text-blue-400 tracking-wide">
            TẠO TÀI KHOẢN
        </h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <!-- Họ và tên -->
            <label class="block mb-2 font-semibold">Họ và tên</label>
            <input type="text" name="name" required
                class="w-full p-3 mb-4 rounded bg-gray-700 border border-gray-600 focus:border-blue-500 outline-none">

            <!-- Email -->
            <label class="block mb-2 font-semibold">Email</label>
            <input type="email" name="email" required
                class="w-full p-3 mb-4 rounded bg-gray-700 border border-gray-600 focus:border-blue-500 outline-none">

            <!-- Mật khẩu -->
            <label class="block mb-2 font-semibold">Mật khẩu</label>
            <input type="password" name="password" required
                class="w-full p-3 mb-4 rounded bg-gray-700 border border-gray-600 focus:border-blue-500 outline-none">

            <!-- Role -->
            <label class="block mb-2 font-semibold">Chọn chức vụ</label>
            <select name="role" required
                class="w-full p-3 mb-6 rounded bg-gray-700 border border-gray-600 focus:border-blue-500 outline-none cursor-pointer">
                <option value="staff">Nhân viên (cán bộ sử dụng thiết bị)</option>
                <option value="technician">Kỹ thuật viên (phòng vật tư)</option>
                <option value="director">Ban giám đốc</option>
            </select>

            <!-- Nút đăng ký -->
            <button
                class="w-full bg-blue-500 hover:bg-blue-600 transition duration-200 p-3 rounded-lg font-bold text-lg shadow-lg">
                Đăng ký
            </button>
        </form>

        <!-- Lỗi -->
        @if ($errors->any())
            <p class="text-red-400 mt-4 text-center">{{ $errors->first() }}</p>
        @endif

        <!-- Link đăng nhập -->
        <p class="text-center mt-6 text-gray-400 text-sm">
            Đã có tài khoản?
            <a href="/login" class="text-blue-400 font-semibold hover:underline">Đăng nhập</a>
        </p>

    </div>

</body>
</html>
