<!-- <h2>Trang dành cho Nhân viên</h2>

<p>
    <a href="{{ route('fault_reports.index') }}">Xem danh sách báo cáo hỏng hóc</a>
</p>

<p>
    <a href="{{ route('fault_reports.create') }}">+ Tạo báo cáo hỏng hóc mới</a>
</p>
<p>
    <a href="{{ route('devices.index') }}"> Danh sách thiết bị </a>
</p>
<p>
    <a href="{{ url('/logout') }}">Đăng xuất</a>
</p> -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Nhân viên</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white min-h-screen">

    <!-- HEADER -->
    <div class="bg-gray-800 p-5 shadow-lg flex justify-between items-center">
        <h1 class="text-2xl font-bold">👨‍⚕️ Trang dành cho Nhân viên</h1>

        <a href="/logout"
           class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg font-semibold">
            Đăng xuất
        </a>
    </div>

    <!-- CONTENT -->
    <div class="max-w-4xl mx-auto mt-10">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Xem danh sách báo cáo -->
            <a href="/fault-reports"
                class="block bg-gray-800 p-6 rounded-xl shadow hover:bg-gray-700 transition">
                <div class="text-xl font-bold mb-2">📄 Xem danh sách báo cáo hỏng hóc</div>
                <p class="text-gray-300">Xem lại các báo cáo thiết bị mà bạn đã gửi.</p>
            </a>

            <!-- Tạo báo cáo mới -->
            <a href="/fault-reports/create"
                class="block bg-blue-700 p-6 rounded-xl shadow hover:bg-blue-600 transition">
                <div class="text-xl font-bold mb-2">➕ Tạo báo cáo hỏng hóc mới</div>
                <p class="text-gray-100">Gửi báo cáo sửa chữa thiết bị nhanh chóng.</p>
            </a>

            <!-- Danh sách thiết bị -->
            <a href="/devices"
                class="block bg-gray-800 p-6 rounded-xl shadow hover:bg-gray-700 transition">
                <div class="text-xl font-bold mb-2">🛠️ Danh sách thiết bị</div>
                <p class="text-gray-300">Theo dõi các thiết bị y tế hiện có.</p>
            </a>

        </div>
    </div>

</body>
</html>
