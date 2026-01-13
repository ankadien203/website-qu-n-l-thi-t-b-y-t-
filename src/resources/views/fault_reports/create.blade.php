<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giấy Báo Sửa Chữa - Mẫu 04</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 py-10">

    <div class="max-w-6xl mx-auto bg-white p-10 rounded-xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="text-center mb-6">
            <h2 class="text-xl font-semibold">BỆNH VIỆN ĐA KHOA KHU VỰC TÂN CHÂU</h2>
            <p class="text-right text-gray-600">Mẫu 04</p>
            <h1 class="text-3xl font-bold text-blue-700 mt-2">GIẤY BÁO SỬA CHỮA</h1>
        </div>

        <form action="{{ route('fault_reports.store') }}" method="POST">
            @csrf

            <!-- Đơn vị báo sửa chữa -->
            <label class="block font-semibold mb-2">Đơn vị báo sửa chữa:</label>
            <input type="text" name="department"
                   class="w-full p-3 mb-4 border rounded-lg focus:ring-2 focus:ring-blue-500" required>

            <!-- Kính gửi -->
            <label class="block font-semibold mb-2">Kính gửi:</label>
            <input type="text" name="sent_to"
                   class="w-full p-3 mb-6 border rounded-lg focus:ring-2 focus:ring-blue-500" required>

            <!-- TABLE -->
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr class="text-center font-semibold">
                            <th class="border p-2">STT</th>
                            <th class="border p-2">Đề nghị sửa chữa</th>
                            <th class="border p-2">Đơn vị tính</th>
                            <th class="border p-2">SL (số)</th>
                            <th class="border p-2">SL (chữ)</th>
                            <th class="border p-2">Địa điểm</th>
                            <th class="border p-2">Tình trạng</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="text-center">
                            <td class="border p-2">1</td>

                            <td class="border p-2">
                                <input type="text" name="device_name"
                                       class="w-full border p-2 rounded">
                            </td>

                            <td class="border p-2">
                                <input type="text" name="unit"
                                       class="w-full border p-2 rounded">
                            </td>

                            <td class="border p-2">
                                <input type="number" name="quantity"
                                       class="w-full border p-2 rounded">
                            </td>

                            <td class="border p-2">
                                <input type="text" name="quantity_text"
                                       class="w-full border p-2 rounded">
                            </td>

                            <td class="border p-2">
                                <input type="text" name="location"
                                       class="w-full border p-2 rounded">
                            </td>

                            <td class="border p-2">
                                <input type="text" name="device_status"
                                       class="w-full border p-2 rounded">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Mô tả -->
            <label class="block font-semibold mt-6 mb-2">Giám định tình trạng hư hỏng:</label>
            <textarea name="description" rows="5"
                      class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>

            <!-- SIGN AREA -->
            <div class="grid grid-cols-3 text-center mt-10">

                <div>
                    <p class="font-semibold">Ý kiến giải quyết<br>Trưởng / Phó phòng</p>
                    <div class="mt-10 border-t w-3/4 mx-auto"></div>
                </div>

                <div>
                    <p class="font-semibold">Trưởng, Phó<br>Khoa/Phòng nơi đề nghị</p>
                    <div class="mt-10 border-t w-3/4 mx-auto"></div>
                </div>

                <div>
                    <p class="font-semibold">Người đề nghị<br>(Ký, ghi rõ họ tên)</p>
                    <div class="mt-10 border-t w-3/4 mx-auto"></div>
                </div>

            </div>

            <!-- SUBMIT -->
            <div class="text-center mt-10">
                <button type="submit"
                        class="px-8 py-3 bg-blue-600 text-white text-lg rounded-xl shadow hover:bg-blue-700 transition">
                    Gửi báo cáo
                </button>
            </div>

        </form>

        <div class="text-center mt-14">
            <h2 class="text-2xl font-bold text-gray-800">BAN GIÁM ĐỐC</h2>
        </div>

    </div>

</body>
</html>
