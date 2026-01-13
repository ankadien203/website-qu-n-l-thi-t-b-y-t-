<h2>Danh sách cần kiểm tra & đánh giá</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Thiết bị</th>
        <th>Người báo cáo</th>
        <th>Tình trạng</th>
        <th>Ngày báo</th>
        <th>Đánh giá</th>
    </tr>

    @foreach($reports as $r)
    <tr>
        <td>{{ $r->id }}</td>
        <td>{{ $r->device_name }}</td>
        <td>{{ $r->user->name }}</td>
        <td>{{ $r->device_status }}</td>
        <td>{{ $r->created_at }}</td>
        <td><a href="{{ route('inspection.detail', $r->id) }}">Xem chi tiết</a></td>
    </tr>
    @endforeach
</table>

<p><a href="{{ url('/dashboard/technician') }}">⬅ Quay lại dashboard</a></p>
