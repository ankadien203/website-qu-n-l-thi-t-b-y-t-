<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Biên bản nghiệm thu thiết bị</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<header class="bg-blue-700 text-white p-5 shadow-lg">
    <div class="max-w-5xl mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">✅ Nghiệm thu thiết bị</h1>

        <a href="{{ auth()->user()->role === 'director' ? '/dashboard/director' : '/dashboard/technician' }}"
           class="bg-white text-blue-700 hover:bg-blue-50 px-4 py-2 rounded-lg font-semibold transition">
            ⬅️ Về Dashboard
        </a>
    </div>
</header>

<main class="max-w-5xl mx-auto mt-10 px-4">
    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-100 text-green-800 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200">
            <div class="font-semibold mb-1">Có lỗi nhập liệu:</div>
            <ul class="list-disc pl-5 text-sm space-y-1">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow p-8">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Biên bản nghiệm thu thiết bị</h2>

        <form method="POST" action="/technician/acceptance" class="space-y-5">
            @csrf

            {{-- Loại sửa chữa --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">Loại sửa chữa</label>
                <select id="repair_type" name="repair_type"
                        class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <option value="internal" {{ old('repair_type','internal') === 'internal' ? 'selected' : '' }}>
                        Sửa chữa nội bộ
                    </option>
                    <option value="external" {{ old('repair_type') === 'external' ? 'selected' : '' }}>
                        Sửa chữa bên ngoài
                    </option>
                </select>
                @error('repair_type')
                    <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tên thiết bị --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">Tên thiết bị</label>
                <select id="device_name" name="device_name"
                        class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <option value="">-- Chọn thiết bị --</option>
                </select>
                <p class="text-gray-500 text-sm mt-1">
                    Danh sách thiết bị sẽ thay đổi theo loại sửa chữa bạn chọn.
                </p>
                @error('device_name')
                    <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tên kỹ thuật viên nghiệm thu (readonly, không gửi lên server) --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">Tên kỹ thuật viên nghiệm thu</label>
                <input type="text"
                       value="{{ auth()->user()->name }}"
                       class="w-full border rounded-xl px-4 py-3 bg-gray-100 text-gray-800"
                       readonly>
                <p class="text-gray-500 text-sm mt-1">Tự động lấy theo tài khoản đăng nhập.</p>
            </div>

            {{-- Ngày sửa chữa --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">Ngày sửa chữa</label>
                <input type="date" name="repair_date" value="{{ old('repair_date') }}"
                       class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
                @error('repair_date')
                    <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kết quả nghiệm thu --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">Kết quả nghiệm thu</label>
                <textarea name="acceptance_result" rows="4"
                          class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                          placeholder="Ví dụ: Thiết bị hoạt động bình thường, đủ chức năng..."
                          required>{{ old('acceptance_result') }}</textarea>
                @error('acceptance_result')
                    <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-xl transition">
                ✅ Nghiệm thu
            </button>
        </form>
    </div>
</main>
<div
    id="acceptance-data"
    data-internal='@json($internalDevices)'
    data-external='@json($externalDevices)'
    data-old-type='@json(old("repair_type","internal"))'
    data-old-device='@json(old("device_name",""))'
></div>


<script>
    const dataEl = document.getElementById('acceptance-data');

    const internalDevices = JSON.parse(dataEl.dataset.internal || '[]');
    const externalDevices = JSON.parse(dataEl.dataset.external || '[]');

    // old() trả string nên mình parse lại cho chắc
    const oldType = JSON.parse(dataEl.dataset.oldType || '"internal"');
    const oldDevice = JSON.parse(dataEl.dataset.oldDevice || '""');

    const repairTypeEl = document.getElementById('repair_type');
    const deviceEl = document.getElementById('device_name');

    function renderDevices(type, selectedValue = '') {
        const list = (type === 'external') ? externalDevices : internalDevices;

        deviceEl.innerHTML = '';

        const first = document.createElement('option');
        first.value = '';
        first.textContent = '-- Chọn thiết bị --';
        deviceEl.appendChild(first);

        if (!Array.isArray(list) || list.length === 0) {
            const opt = document.createElement('option');
            opt.value = '';
            opt.textContent = (type === 'external')
                ? 'Chưa có thiết bị trong danh sách sửa chữa bên ngoài'
                : 'Chưa có thiết bị trong danh sách sửa chữa nội bộ';
            opt.disabled = true;
            deviceEl.appendChild(opt);
            return;
        }

        list.forEach((name) => {
            const opt = document.createElement('option');
            opt.value = name;
            opt.textContent = name;
            if (name === selectedValue) opt.selected = true;
            deviceEl.appendChild(opt);
        });
    }

    // init (giữ lại old khi validate fail)
    renderDevices(oldType, oldDevice);

    // change type -> reset chọn thiết bị
    repairTypeEl.addEventListener('change', () => {
        renderDevices(repairTypeEl.value, '');
    });
</script>


</body>
</html>
