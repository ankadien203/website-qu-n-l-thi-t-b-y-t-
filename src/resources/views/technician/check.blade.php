<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kiểm tra ban đầu & đánh giá</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <!-- HEADER -->
    <div class="flex items-center gap-3 mb-6">
        <span class="text-3xl">🔍</span>
        <h1 class="text-3xl font-bold text-gray-800">
            Kiểm tra ban đầu & đánh giá
        </h1>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white shadow-lg rounded-xl p-6">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-blue-600 text-white text-left">
                    <th class="p-3 rounded-l-lg">ID</th>
                    <th class="p-3">Mô tả chi tiết</th>
                    <th class="p-3">Người báo cáo</th>
                    <th class="p-3">Ngày báo cáo</th>
                    <th class="p-3 rounded-r-lg">Xem chi tiết</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($reports as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3 font-semibold text-gray-700">{{ $item->id }}</td>
                    <td class="p-3">{{ $item->description }}</td>
                    <td class="p-3">{{ $item->user->name }}</td>
                    <td class="p-3 text-gray-600">{{ $item->created_at }}</td>
                    <td class="p-3">
                        <a href="/fault-reports/{{ $item->id }}"
                            class="text-blue-600 hover:text-blue-800 font-semibold underline">
                            Xem →
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- BACK BUTTON -->
    <div class="mt-6">
        <a href="/dashboard/technician"
           class="text-blue-600 hover:text-blue-800 font-semibold flex items-center gap-1">
            ← Quay lại dashboard
        </a>
    </div>

</body>
</html>
