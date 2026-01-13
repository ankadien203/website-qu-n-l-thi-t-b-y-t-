<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sửa chữa nội bộ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<div class="bg-blue-600 text-white p-6">
    <h1 class="text-2xl font-bold">📋 Danh sách sửa chữa nội bộ</h1>
</div>

<div class="max-w-6xl mx-auto mt-8 bg-white rounded-xl shadow p-6">

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="p-3">Thiết bị</th>
                <th class="p-3">Ngày sửa</th>
                <th class="p-3">Lỗi</th>
                <th class="p-3">Nội dung sửa</th>
                <th class="p-3">Kỹ thuật viên</th>
            </tr>
        </thead>
        <tbody>
            @foreach($repairs as $repair)
                <tr class="border-b">
                    <td class="p-3">{{ $repair->device_name }}</td>
                    <td class="p-3">{{ $repair->repair_date }}</td>
                    <td class="p-3">{{ $repair->fault }}</td>
                    <td class="p-3">{{ $repair->repair_content }}</td>
                    <td class="p-3">{{ $repair->technician_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6 flex gap-4">
    <!-- Thêm sửa chữa -->
    <a href="/technician/repairs/internal"
       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        ➕ Thêm sửa chữa
    </a>

    <!-- Quay lại Dashboard -->
    <a href="/dashboard/technician"
       class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
        ⬅ Quay lại Dashboard
    </a>
</div>

</div>

</body>
</html>
