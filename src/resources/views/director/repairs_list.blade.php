<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Báo cáo sửa chữa - Ban Giám Đốc</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<!-- Header -->
<div class="bg-blue-600 text-white p-6 shadow">
    <h1 class="text-2xl font-bold flex items-center gap-2">
        📋 Báo cáo sửa chữa thiết bị
    </h1>
    <p class="text-blue-100 mt-1">
        Dành cho Ban Giám đốc (chỉ xem)
    </p>
</div>

<!-- Content -->
<div class="max-w-6xl mx-auto mt-8 bg-white rounded-xl shadow p-6">

    <table class="w-full border-collapse">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="p-3 text-left">Thiết bị</th>
                <th class="p-3">Ngày sửa</th>
                <th class="p-3 text-left">Lỗi</th>
                <th class="p-3 text-left">Nội dung sửa</th>
                <th class="p-3 text-left">Kỹ thuật viên</th>
            </tr>
        </thead>
        <tbody>
            @foreach($repairs as $repair)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $repair->device_name }}</td>
                    <td class="p-3 text-center">{{ $repair->repair_date }}</td>
                    <td class="p-3">{{ $repair->fault }}</td>
                    <td class="p-3">{{ $repair->repair_content }}</td>
                    <td class="p-3">{{ $repair->technician_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        <a href="/dashboard/director"
           class="inline-flex items-center gap-2 bg-gray-600 text-white px-5 py-2 rounded hover:bg-gray-700">
            ⬅ Quay lại Dashboard
        </a>
    </div>
</div>

</body>
</html>
