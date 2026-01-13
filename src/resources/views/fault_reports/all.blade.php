<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách báo lỗi</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
            font-size: 26px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            border-radius: 10px;
            overflow: hidden;
        }

        thead {
            background: #2563eb;
            color: white;
        }

        th, td {
            padding: 12px 16px;
            text-align: center;
            font-size: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover {
            background: #f1f5ff;
        }

        .status-pending {
            color: #b45309;
            font-weight: bold;
        }

        a.view-link {
            color: #2563eb;
            font-weight: bold;
            text-decoration: none;
        }

        a.view-link:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

<div class="container">
    <h2>Danh sách báo lỗi thiết bị</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mô tả chi tiết</th>
                <th>Người báo cáo</th>
                <th>Trạng thái</th>
                <th>Ngày báo</th>
                <th>Xem chi tiết</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->description }}</td>
                <td>{{ $report->user->name }}</td>

                <td>
                    <span class="status-pending">
                        {{ $report->status }}
                    </span>
                </td>

                <td>{{ $report->created_at }}</td>

                <td>
                    <a class="view-link" href="{{ url('/fault-reports/' . $report->id) }}">
                        Xem
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/dashboard/' . Auth::user()->role) }}"
       style="background: #3b82f6; color: white; padding: 10px 18px; 
              border-radius: 8px; text-decoration: none; font-weight: bold; 
              box-shadow: 0 2px 6px rgba(0,0,0,0.15); transition: 0.25s;">
        ⬅ Quay lại Dashboard
    </a>
</div>

</body>
</html>
