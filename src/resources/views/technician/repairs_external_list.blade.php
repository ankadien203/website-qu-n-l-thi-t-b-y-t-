<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Danh sách xin báo giá</title>

    <style>
        *{ box-sizing:border-box; }
        body{
            margin:0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
            padding: 50px 20px;
            color:#0f172a;
        }
        .wrap{
            max-width: 1100px;
            margin: 0 auto;
        }
        .top{
            display:flex;
            justify-content: space-between;
            align-items:center;
            gap:12px;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }
        .title{
            font-size: 26px;
            font-weight: 800;
            color:#0b2a6f;
            margin:0;
        }

        /* Buttons */
        a.btn{
            text-decoration:none;
            background:#ffffff;
            padding: 10px 14px;
            border-radius: 14px;
            font-weight: 700;
            color:#1e3a8a;
            box-shadow: 0 10px 28px rgba(0,0,0,0.10);
            display:inline-flex;
            align-items:center;
            gap:8px;
        }
        a.btn:hover{
            box-shadow: 0 12px 32px rgba(0,0,0,0.12);
        }

        .card{
            background:#fff;
            border-radius: 18px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.12);
            border: 1px solid rgba(148,163,184,0.25);
            overflow:hidden;
        }
        table{
            width:100%;
            border-collapse: collapse;
        }
        th, td{
            padding: 14px 14px;
            border-bottom: 1px solid #e2e8f0;
            text-align:left;
            vertical-align: top;
        }
        th{
            background:#f8fafc;
            font-weight: 800;
            color:#0f172a;
        }
        .badge{
            display:inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            background:#eef2ff;
            color:#1e3a8a;
        }
        .empty{
            padding: 18px;
            color:#475569;
        }
        .muted{
            color:#64748b;
            font-size: 13px;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="top">
        <div>
            <h1 class="title">Danh sách xin báo giá</h1>
            <div class="muted">Theo dõi các yêu cầu sửa chữa/mua sắm bên ngoài</div>
        </div>

        <div style="display:flex; gap:10px; flex-wrap:wrap;">
            @if(auth()->user()->role === 'technician')
                <a class="btn" href="/technician/repairs/external">➕ Tạo yêu cầu</a>
            @endif

            <a class="btn"
               href="{{ auth()->user()->role === 'director' ? '/dashboard/director' : '/dashboard/technician' }}">
                ⬅️ Về Dashboard
            </a>
        </div>
    </div>

    <div class="card">
        @if($quotes->isEmpty())
            <div class="empty">Chưa có yêu cầu xin báo giá nào.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th style="width:60px;">#</th>
                        <th>Tên thiết bị</th>
                        <th style="width:110px;">Số lượng</th>

                        <!--  THÊM CỘT KỸ THUẬT VIÊN -->
                        <th style="width:220px;">Kỹ thuật viên</th>

                        <th>Công ty cung cấp</th>
                        <th style="width:130px;">Trạng thái</th>
                        <th style="width:180px;">Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotes as $i => $q)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $q->device_name }}</td>
                            <td>{{ $q->quantity }}</td>

                            <!--  HIỂN THỊ technician_name (nếu chưa có dữ liệu cũ thì để —) -->
                            <td>{{ $q->technician_name ?? '—' }}</td>

                            <td>{{ $q->supplier_company }}</td>
                            <td><span class="badge">{{ $q->status }}</span></td>
                            <td>{{ $q->created_at?->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
</body>
</html>
