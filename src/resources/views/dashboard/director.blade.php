<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard - Ban Giám Đốc</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">

    <!-- HEADER -->
    <header class="bg-blue-700 text-white shadow-lg">
        <div class="max-w-6xl mx-auto px-6 py-5 flex items-center justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold tracking-wide">📊 Dashboard - Ban Giám Đốc</h1>
                <p class="text-blue-100 mt-1">Hệ thống quản lý thiết bị & báo cáo tổng hợp</p>
            </div>

            <a href="{{ url('/logout') }}"
               class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-xl font-semibold transition shadow">
                🚪 Đăng xuất
            </a>
        </div>
    </header>

    <!-- CONTENT -->
    <main class="max-w-6xl mx-auto px-6 py-10">

        <!-- HERO CARD -->
        <a href="/devices"
           class="block bg-white rounded-3xl shadow-md hover:shadow-xl transition border border-gray-100">
            <div class="p-8 md:p-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <div class="text-4xl">📦</div>
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-800 mt-3">Danh sách thiết bị</h2>
                    <p class="text-slate-600 mt-2">
                        Xem và theo dõi toàn bộ thiết bị đang sử dụng trong hệ thống.
                    </p>
                </div>

                <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-5 py-3 rounded-2xl font-semibold">
                    Xem thiết bị →
                </div>
            </div>
        </a>

        <!-- GRID ACTIONS -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <a href="{{ url('/fault-reports-all') }}"
               class="block bg-white p-6 rounded-2xl shadow hover:shadow-xl border hover:border-blue-500 transition">
                <div class="text-4xl mb-4">📋</div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Báo cáo hỏng hóc</h3>
                <p class="text-slate-600">Theo dõi tất cả báo cáo hỏng hóc từ nhân viên/kỹ thuật viên.</p>
            </a>

            <a href="/director/repairs"
               class="block bg-white p-6 rounded-2xl shadow hover:shadow-xl border hover:border-green-500 transition">
                <div class="text-4xl mb-4">🛠️</div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Báo cáo sửa chữa nội bộ</h3>
                <p class="text-slate-600">Xem danh sách các phiếu sửa chữa nội bộ đã thực hiện.</p>
            </a>

            <a href="/director/repairs/external"
               class="block bg-white p-6 rounded-2xl shadow hover:shadow-xl border hover:border-purple-500 transition">
                <div class="text-4xl mb-4">🧾</div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Danh sách xin báo giá</h3>
                <p class="text-slate-600">Xem các yêu cầu xin báo giá (sửa chữa bên ngoài / mua sắm).</p>
            </a>

            <a href="/director/acceptance"
               class="block bg-white p-6 rounded-2xl shadow hover:shadow-xl border hover:border-sky-500 transition">
                <div class="text-4xl mb-4">✅</div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Hồ sơ quản lý</h3>
                <p class="text-slate-600">Xem các biên bản nghiệm thu sau sửa chữa.</p>
            </a>

        </div>

        <!-- FOOTER -->
        <div class="mt-10 text-center text-slate-500 text-sm">
            © {{ date('Y') }} Hệ thống Quản lý Thiết bị – Bệnh Viện Tân Châu
        </div>

    </main>

</body>
</html>
