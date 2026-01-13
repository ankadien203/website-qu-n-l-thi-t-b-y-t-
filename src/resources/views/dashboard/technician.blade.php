<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kỹ thuật viên</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- HEADER -->
    <header class="bg-blue-700 text-white p-5 shadow-lg">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">🔧 Dashboard Kỹ thuật viên</h1>

            <a href="/logout"
               class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-white font-semibold transition">
                Đăng xuất
            </a>
        </div>
    </header>

    <!-- CONTENT -->
    <main class="max-w-6xl mx-auto mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- CARD 1 -->
            <a href="/devices"
               class="block bg-white p-6 rounded-2xl shadow hover:shadow-xl border hover:border-blue-500 transition">
                <div class="text-blue-600 text-4xl mb-3">📦</div>
                <h2 class="text-xl font-bold mb-2">Danh sách thiết bị</h2>
                <p class="text-gray-600">Xem toàn bộ thiết bị trong hệ thống.</p>
            </a>

            <!-- CARD 2 -->
            <a href="/technician/check"
               class="block bg-white p-6 rounded-2xl shadow hover:shadow-xl border hover:border-blue-500 transition">
                <div class="text-green-600 text-4xl mb-3">🛠️</div>
                <h2 class="text-xl font-bold mb-2">Kiểm tra ban đầu & đánh giá</h2>
                <p class="text-gray-600">Thực hiện đánh giá thiết bị trước sửa chữa.</p>
            </a>

            <!-- CARD 3 -->
            <a href="/fault-reports-all"
               class="block bg-white p-6 rounded-2xl shadow hover:shadow-xl border hover:border-blue-500 transition">
                <div class="text-yellow-500 text-4xl mb-3">📄</div>
                <h2 class="text-xl font-bold mb-2">Danh sách báo cáo hỏng hóc</h2>
                <p class="text-gray-600">Theo dõi tất cả các báo cáo từ nhân viên.</p>
            </a>

            <!-- CARD 4 -->
            <a href="/technician/repairs"
               class="block bg-white p-6 rounded-2xl shadow hover:shadow-xl border hover:border-blue-500 transition">
                <div class="text-4xl mb-4">🛠️</div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">Thực hiện sửa chữa</h2>
                <p class="text-gray-600">Tiến hành sửa chữa các thiết bị đã được đánh giá.</p>
            </a>

            <!-- CARD 5 -->
            <a href="/technician/repairs/internal/list"
               class="block bg-white p-6 rounded-2xl shadow hover:shadow-xl border hover:border-blue-500 transition">
                <div class="text-4xl mb-4">📋</div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">Báo cáo sửa chữa</h2>
                <p class="text-gray-600">Xem toàn bộ báo cáo sửa chữa thiết bị đã thực hiện (Sửa chữa nội bộ).</p>
            </a>

            <!-- CARD 6 (NEW): Danh sách xin báo giá -->
            <a href="/technician/repairs/external/list"
               class="block bg-white p-6 rounded-2xl shadow hover:shadow-xl border hover:border-blue-500 transition">
                <div class="text-4xl mb-4">🧾</div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">Danh sách xin báo giá</h2>
                <p class="text-gray-600">
                    Xem danh sách các thiết bị đã gửi yêu cầu xin báo giá (Sửa chữa bên ngoài).
                </p>
            </a>
            <!-- CARD 7 (NEW): nghiệm thu thiêt bị-->
            <a href="/technician/acceptance"
                class="block bg-white p-6 rounded-2xl shadow hover:shadow-xl border hover:border-blue-500 transition">
                    <div class="text-purple-600 text-4xl mb-3">✅</div>
                    <h2 class="text-xl font-bold mb-2">Nghiệm thu thiết bị</h2>
                    <p class="text-gray-600">Lập biên bản nghiệm thu sau khi sửa chữa.</p>
                </a>
            <!-- CARD 8 (NEW): danh sách nghiệm thu thiêt bị-->   
            <a href="/technician/acceptance/list"
            class="block bg-white p-6 rounded-2xl shadow hover:shadow-xl border hover:border-blue-500 transition">
                <div class="text-indigo-600 text-4xl mb-3">📑</div>
                <h2 class="text-xl font-bold mb-2">Hồ sơ quản lý</h2>
                <p class="text-gray-600">Cập nhật thông tin vào hồ sơ quản lý thiết bị y tế của bệnh viện để theo dõi trong tương lai.</p>
            </a>



        </div>
    </main>

</body>
</html>
