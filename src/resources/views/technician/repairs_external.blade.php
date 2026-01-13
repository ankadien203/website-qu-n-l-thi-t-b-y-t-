<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Bảo dưỡng thiết bị y tế</title>

    <style>
        * { box-sizing: border-box; }

        body{
            margin:0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
            padding: 60px 20px;
            color:#0f172a;
        }

        .topbar{
            max-width: 900px;
            margin: 0 auto 18px;
            display:flex;
            justify-content: space-between;
            align-items:center;
            gap: 12px;
        }

        .brand{
            display:flex;
            align-items:center;
            gap:10px;
            font-weight:800;
            color:#1e3a8a;
        }
        .brand .icon{
            width:42px;height:42px;
            border-radius:14px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#2563eb;
            color:#fff;
            box-shadow: 0 10px 22px rgba(37,99,235,0.25);
            font-size:20px;
        }

        .btn{
            display:inline-flex;
            align-items:center;
            gap:8px;
            border:0;
            cursor:pointer;
            font-weight:700;
            padding: 10px 14px;
            border-radius: 14px;
            text-decoration:none;
            transition: transform .08s ease, box-shadow .08s ease;
            user-select:none;
        }
        .btn:active{ transform: translateY(1px); }

        .btn-secondary{
            background:#ffffff;
            color:#1e3a8a;
            box-shadow: 0 10px 28px rgba(0,0,0,0.10);
        }
        .btn-secondary:hover{ box-shadow: 0 12px 32px rgba(0,0,0,0.12); }

        .container{
            max-width: 900px;
            margin: 0 auto;
            background:#fff;
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.12);
            border: 1px solid rgba(148,163,184,0.25);
        }

        h1{
            margin:0 0 6px;
            font-size: 28px;
            color:#0b2a6f;
        }
        .subtitle{
            margin:0 0 22px;
            color:#475569;
            font-size: 15px;
        }

        .grid{
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        @media (max-width: 720px){
            .grid{ grid-template-columns: 1fr; }
        }

        .field{
            text-align:left;
        }
        label{
            display:block;
            font-weight:700;
            margin: 0 0 8px;
            color:#0f172a;
        }

        input, select{
            width:100%;
            padding: 12px 12px;
            border-radius: 14px;
            border: 1px solid #cbd5e1;
            outline: none;
            font-size: 15px;
            background: #fff;
        }
        input:focus, select:focus{
            border-color:#2563eb;
            box-shadow: 0 0 0 4px rgba(37,99,235,0.14);
        }

        .actions{
            margin-top: 18px;
            display:flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        .btn-primary{
            background:#2563eb;
            color:#fff;
            box-shadow: 0 14px 30px rgba(37,99,235,0.25);
        }
        .btn-primary:hover{
            box-shadow: 0 18px 36px rgba(37,99,235,0.28);
        }

        .btn-light{
            background:#e2e8f0;
            color:#0f172a;
        }
        .btn-light:hover{ filter: brightness(0.98); }

        .alert{
            border-radius: 16px;
            padding: 12px 14px;
            margin-bottom: 16px;
            border: 1px solid;
            font-size: 14px;
        }
        .alert-success{
            background:#ecfdf5;
            border-color:#a7f3d0;
            color:#065f46;
        }
        .alert-error{
            background:#fff7ed;
            border-color:#fdba74;
            color:#9a3412;
        }
        .alert ul{
            margin: 8px 0 0;
            padding-left: 18px;
        }

        .hint{
            margin-top: 8px;
            font-size: 12px;
            color:#64748b;
        }
    </style>
</head>
<body>

    <div class="topbar">
        <div class="brand">
            <div class="icon">🧾</div>
            <div>
                <div style="font-size:16px; line-height:1.1;">Bảo dưỡng thiết bị y tế</div>
                <div style="font-size:12px; font-weight:600; color:#64748b;">Gửi yêu cầu xin báo giá</div>
            </div>
        </div>

        <a class="btn btn-secondary" href="/technician/repairs">⬅️ Quay lại</a>
    </div>

    <div class="container">
        <h1>Bảo dưỡng thiết bị y tế</h1>
        <p class="subtitle">Vui lòng điền thông tin thiết bị để gửi yêu cầu xin báo giá.</p>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <strong>Có lỗi nhập liệu:</strong>
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/technician/repairs/external">
            @csrf

            <div class="grid">
                <!-- ✅ Tên thiết bị: SELECT -->
                <div class="field">
                    <label for="device_name">Tên thiết bị</label>
                    <select id="device_name"
                            name="device_name"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white focus:outline-none focus:ring-4 focus:ring-blue-200">
                        <option value="">-- Chọn thiết bị --</option>

                        @foreach($devices as $d)
                            <option value="{{ $d->name }}" {{ old('device_name') == $d->name ? 'selected' : '' }}>
                                {{ $d->name }}
                            </option>
                        @endforeach
                    </select>


                    <div class="hint">Chọn thiết bị cần mua/sửa chữa ngoài từ danh sách.</div>
                </div>

                <div class="field">
                    <label for="quantity">Số lượng</label>
                    <input
                        id="quantity"
                        name="quantity"
                        type="number"
                        min="1"
                        value="{{ old('quantity', 1) }}"
                        required
                    />
                    <div class="hint">Số lượng tối thiểu là 1.</div>
                </div>
                <div class="field" style="grid-column: 1 / -1;">
                    <label for="technician_name">Tên kỹ thuật viên</label>
                    <input
                        id="technician_name"
                        type="text"
                        value="{{ auth()->user()->name }}"
                        readonly
                    />
                    <div class="hint">Tự động lấy theo tài khoản đăng nhập.</div>
                </div>


                <div class="field" style="grid-column: 1 / -1;">
                    <label for="supplier_company">Công ty cung cấp thiết bị</label>
                    <input
                        id="supplier_company"
                        name="supplier_company"
                        type="text"
                        placeholder="VD: Công ty ABC"
                        value="{{ old('supplier_company') }}"
                        required
                    />
                    <div class="hint">Nhập tên đơn vị/công ty dự kiến cung cấp thiết bị.</div>
                </div>

            </div>

            <div class="actions">
                <button class="btn btn-primary" type="submit">✅ Xin báo giá</button>
                <a class="btn btn-light" href="/technician/repairs">Hủy</a>
            </div>
        </form>
    </div>

</body>
</html>
