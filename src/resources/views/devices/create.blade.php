<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm thiết bị mới</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white w-full max-w-2xl shadow-2xl rounded-2xl p-8">

        <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-6">
            ➕ Thêm Thiết Bị Mới
        </h2>

        <form method="POST" action="{{ route('devices.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Tên thiết bị -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">
                    Tên thiết bị
                </label>
                <input type="text" name="name" required
                       class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Đơn vị tính -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">
                    Đơn vị tính
                </label>
                <input type="text" name="unit" required
                       class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Số lượng -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">
                    Số lượng
                </label>
                <input type="number" name="quantity" value="1" min="1" required
                       class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Vị trí -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">
                    Vị trí
                </label>
                <input type="text" name="location"
                       class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Ảnh minh họa -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">
                    Ảnh minh họa
                </label>
                <input type="file" name="image"
                       class="w-full bg-gray-50 border border-gray-300 p-2 rounded-xl cursor-pointer">
            </div>

            <!-- Button -->
            <button
                class="w-full mt-4 py-3 bg-blue-600 hover:bg-blue-700 text-white text-lg font-semibold rounded-xl shadow-lg transition">
                💾 Lưu thiết bị
            </button>

        </form>

        <div class="text-center mt-6">
            <a href="{{ url('/devices') }}"
               class="text-blue-600 hover:underline">
                ⬅ Quay lại danh sách thiết bị
            </a>
        </div>

    </div>

</body>
</html>
