<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hồ sơ quản lý thiết bị</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<header class="bg-blue-700 text-white p-5 shadow-lg">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">✅ Hồ sơ quản lý thiết bị</h1>

        <div class="flex gap-3">
            @if(auth()->user()->role === 'technician')
                <a href="/technician/acceptance"
                   class="bg-white text-blue-700 hover:bg-blue-50 px-4 py-2 rounded-lg font-semibold transition">
                    ➕ Tạo nghiệm thu
                </a>
            @endif

            <a href="{{ auth()->user()->role === 'director' ? '/dashboard/director' : '/dashboard/technician' }}"
               class="bg-white text-blue-700 hover:bg-blue-50 px-4 py-2 rounded-lg font-semibold transition">
                ⬅️ Về Dashboard
            </a>
        </div>
    </div>
</header>

<main class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white rounded-2xl shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr class="text-left text-gray-700">
                    <th class="p-4 w-16">#</th>
                    <th class="p-4">Tên thiết bị</th>
                    <th class="p-4 w-48">Ngày sửa chữa</th>
                    <th class="p-4 w-40">Loại sửa chữa</th>
                    <th class="p-4 w-56">Kỹ thuật viên nghiệm thu</th>
                    <th class="p-4">Kết quả nghiệm thu</th>
                    <th class="p-4 w-56">Ngày tạo</th>
                </tr>
            </thead>

            <tbody>
                @forelse($acceptances as $i => $a)
                    <tr class="border-t">
                        <td class="p-4">{{ $i + 1 }}</td>
                        <td class="p-4 font-semibold">{{ $a->device_name }}</td>
                        <td class="p-4">{{ \Carbon\Carbon::parse($a->repair_date)->format('d/m/Y') }}</td>

                        <td class="p-4">
                            {{ $a->repair_type === 'internal' ? 'Nội bộ' : 'Bên ngoài' }}
                        </td>

                        <td class="p-4">{{ $a->technician_name }}</td>
                        <td class="p-4">{{ $a->acceptance_result }}</td>
                        <td class="p-4">{{ $a->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-8 text-center text-gray-500">
                            Chưa có biên bản nghiệm thu nào.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>

</body>
</html>
