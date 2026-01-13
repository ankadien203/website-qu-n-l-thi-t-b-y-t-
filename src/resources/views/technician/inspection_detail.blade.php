<h2>Kiểm tra ban đầu & đánh giá</h2>

<p><b>Thiết bị:</b> {{ $report->device_name }}</p>
<p><b>Mô tả sự cố:</b> {{ $report->description }}</p>
<p><b>Người báo cáo:</b> {{ $report->user->name }}</p>

<hr>

<h3>Đánh giá kỹ thuật viên</h3>

<ul>
    <li>Kỹ thuật viên kiểm tra sơ bộ tình trạng thiết bị.</li>
    <li>Đánh giá khả năng sửa chữa: nội bộ hoặc phải gửi đi bên ngoài.</li>
</ul>

<p><b>Phòng phụ trách:</b> Phòng Vật tư – Thiết bị y tế</p>

<br>
<p><a href="{{ route('inspection.list') }}">⬅ Quay lại danh sách</a></p>
