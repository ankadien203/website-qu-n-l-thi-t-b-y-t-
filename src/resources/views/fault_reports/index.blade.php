<!-- <!DOCTYPE html>
<html>
<head>
    <title>Danh sách báo cáo hỏng hóc</title>
</head>
<body>

<h2>Danh sách báo cáo hỏng hóc</h2>

<p><a href="{{ route('fault_reports.create') }}">+ Tạo báo cáo mới</a></p>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <tr>
        <th>ID</th>
        <th>Thiết bị</th>
        <th>Tình trạng</th>
        <th>Mô tả</th>
        <th>Đơn vị báo</th>
        <th>Ngày báo</th>
    </tr>

    @foreach($reports as $report)
    <tr>
        <td>{{ $report->id }}</td>
        <td>{{ $report->device_name }}</td>
        <td>{{ $report->status }}</td>
        <td>{{ $report->description }}</td>
        <td>{{ $report->department }}</td>
        <td>{{ $report->created_at }}</td>
    </tr>
    @endforeach
</table>

</body>
</html> -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách báo cáo hỏng hóc</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-10">

    <div class="max-w-6xl mx-auto bg-white shadow-xl rounded-xl p-8">
        
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">📋 Danh sách báo cáo hỏng hóc</h1>

            <a href="{{ url('/fault-reports/create') }}"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow">
                + Tạo báo cáo mới
            </a>
        </div>

        <table class="min-w-full bg-white rounded-lg overflow-hidden shadow">
            <thead>
            <tr class="bg-gray-800 text-white text-left">
                <th class="py-3 px-4">ID</th>
                <th class="py-3 px-4">Thiết bị</th>
                <th class="py-3 px-4">Tình trạng</th>
                <th class="py-3 px-4">Mô tả</th>
                <th class="py-3 px-4">Đơn vị báo</th>
                <th class="py-3 px-4">Ngày báo</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($reports as $r)
                <tr class="border-b hover:bg-gray-100 transition">
                    <td class="py-2 px-4">{{ $r->id }}</td>
                    <td class="py-2 px-4">{{ $r->device_name }}</td>
                    <td class="py-2 px-4 capitalize text-yellow-600 font-semibold">{{ $r->status }}</td>
                    <td class="py-2 px-4">{{ $r->description }}</td>
                    <td class="py-2 px-4">{{ $r->department }}</td>
                    <td class="py-2 px-4">{{ $r->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            <a href="/dashboard/staff"
               class="text-blue-600 hover:underline text-lg">⬅ Quay lại dashboard</a>
        </div>

    </div>

</body>
</html>
