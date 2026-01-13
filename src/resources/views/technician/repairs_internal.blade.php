<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa chữa nội bộ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <div class="bg-blue-600 text-white p-6 shadow">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-2xl font-bold">🔧 Sửa chữa nội bộ</h1>
            <p class="text-blue-100 mt-1">Ghi nhận quá trình sửa chữa thiết bị</p>
        </div>
    </div>

    <!-- Form -->
    <div class="max-w-3xl mx-auto mt-10 bg-white rounded-2xl shadow p-8">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                Vui lòng kiểm tra lại các trường bên dưới.
            </div>
        @endif

        <form method="POST" action="/technician/repairs/internal" class="space-y-6">
            @csrf

            <!-- Tên thiết bị (SELECT) -->
            <div>
                <label class="block font-semibold mb-1">Tên thiết bị</label>

                <select name="device_name" required
                        class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200 bg-white">
                    <option value="">-- Chọn thiết bị --</option>
                    @foreach($devices as $d)
                        <option value="{{ $d->name }}" {{ old('device_name') == $d->name ? 'selected' : '' }}>
                            {{ $d->name }}
                        </option>
                    @endforeach
                </select>

                @error('device_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ngày sửa chữa -->
            <div>
                <label class="block font-semibold mb-1">Ngày sửa chữa</label>
                <input type="date" name="repair_date"
                       value="{{ old('repair_date') }}"
                       class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                       required>

                @error('repair_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lỗi hỏng -->
            <div>
                <label class="block font-semibold mb-1">Lỗi hỏng</label>
                <textarea name="fault"
                          class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                          rows="3"
                          required>{{ old('fault') }}</textarea>

                @error('fault')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nội dung sửa chữa -->
            <div>
                <label class="block font-semibold mb-1">Nội dung sửa chữa</label>
                <textarea name="repair_content"
                          class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                          rows="4"
                          required>{{ old('repair_content') }}</textarea>

                @error('repair_content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tên kỹ thuật viên -->
            <div>
                <label class="block font-semibold mb-1">Tên kỹ thuật viên</label>
                <input type="text"
                    value="{{ auth()->user()->name }}"
                    class="w-full border rounded-lg px-4 py-2 bg-gray-100 cursor-not-allowed"
                    readonly>


                @error('technician_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4">
                <a href="/technician/repairs"
                   class="px-6 py-2 rounded-lg bg-gray-300 hover:bg-gray-400">
                    Quay lại
                </a>

                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                    💾 Lưu biểu mẫu
                </button>
            </div>
        </form>
    </div>

</body>
</html>
