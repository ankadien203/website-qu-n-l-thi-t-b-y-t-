<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách thiết bị</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="container mx-auto mt-10 p-6">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                📦 Danh sách thiết bị
            </h1>

            {{-- Chỉ kỹ thuật viên mới được thêm thiết bị --}}
            @if(Auth::user()->role == 'technician')
                <a href="{{ route('devices.create') }}"
                    class="px-5 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition text-sm font-semibold">
                    ➕ Thêm thiết bị mới
                </a>
            @endif
        </div>
        

        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Ảnh</th>
                        <th class="py-3 px-4">Tên thiết bị</th>
                        <th class="py-3 px-4">Đơn vị tính</th>
                        <th class="py-3 px-4">Số lượng</th>
                        <th class="py-3 px-4">Vị trí</th>
                        <th class="py-3 px-4">Tình trạng</th>
                        <th class="py-3 px-4">Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($devices as $device)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="py-3 px-4">{{ $device->id }}</td>

                            <td class="py-3 px-4">
                                @if ($device->image)
                                    <img src="{{ asset('storage/' . $device->image) }}"
                                        class="w-14 h-14 rounded object-cover shadow">
                                @else
                                    <span class="text-gray-400">Không có ảnh</span>
                                @endif
                            </td>

                            <td class="py-3 px-4 font-semibold">{{ $device->name }}</td>
                            <td class="py-3 px-4">{{ $device->unit }}</td>
                            <td class="py-3 px-4">{{ $device->quantity }}</td>
                            <td class="py-3 px-4">{{ $device->location }}</td>

                            <td class="py-3 px-4">
                                @if ($device->status === 'active')
                                    <span class="px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full">
                                        Hoạt động
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-sm bg-red-100 text-red-600 rounded-full">
                                        Hỏng
                                    </span>
                                @endif
                            </td>

                            <td class="py-3 px-4 flex gap-3">
                                <a href="{{ url('/fault-reports/create/' . $device->id) }}"
                                    class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm shadow">
                                    Báo hỏng
                                </a>

                                @if(Auth::user()->role == 'technician')
                                    <form action="{{ url('/devices/' . $device->id) }}" method="POST"
                                          onsubmit="return confirm('Bạn chắc chắn muốn xóa?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm shadow">
                                            Xóa
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
         <a href="{{ url('/dashboard/' . Auth::user()->role) }}"
       style="background: #3b82f6; color: white; padding: 10px 18px; 
              border-radius: 8px; text-decoration: none; font-weight: bold; 
              box-shadow: 0 2px 6px rgba(0,0,0,0.15); transition: 0.25s;">
        ⬅ Quay lại Dashboard
    </a>

    </div>

</body>
</html>
