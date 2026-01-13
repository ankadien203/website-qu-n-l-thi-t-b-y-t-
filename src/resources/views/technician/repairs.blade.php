<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thực hiện sửa chữa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <div class="bg-blue-600 text-white p-6 shadow">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold flex items-center gap-2">
                🛠️ Thực hiện sửa chữa
            </h1>
            <p class="text-blue-100 mt-1">
                Lựa chọn hình thức sửa chữa thiết bị
            </p>
        </div>

        <!-- Nút quay lại Dashboard -->
        <a href="/dashboard/technician"
           class="bg-white text-blue-600 px-4 py-2 rounded-lg font-semibold hover:bg-blue-100 transition">
            ⬅ Về trang chủ
        </a>
    </div>
</div>


    <!-- Content -->
    <div class="max-w-5xl mx-auto mt-10 px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Sửa chữa nội bộ -->
            <a href="/technician/repairs/internal"
               class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-8 text-center border hover:border-blue-500">

                <div class="text-5xl mb-4">🔧</div>

                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    Sửa chữa nội bộ
                </h2>

                <p class="text-gray-600">
                    Kỹ thuật viên trực tiếp sửa chữa thiết bị trong đơn vị.
                </p>
            </a>

            <!-- Sửa chữa bên ngoài -->
            <a href="/technician/repairs/external"
               class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-8 text-center border hover:border-orange-500">

                <div class="text-5xl mb-4">🚚</div>

                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    Sửa chữa bên ngoài
                </h2>

                <p class="text-gray-600">
                    Chuyển thiết bị sang đơn vị sửa chữa bên ngoài.
                </p>
            </a>

        </div>
    </div>

</body>
</html>
