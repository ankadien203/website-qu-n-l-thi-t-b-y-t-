<!DOCTYPE html>
<html>
<head>
    <title>Giấy Báo Sửa Chữa - Mẫu 04</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; margin: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid #000; padding: 6px; text-align: center; }
        .title { text-align:center; font-size:22px; font-weight:bold; }
        .sign-col { width: 33%; float:left; text-align:center; }
        .clearfix { clear: both; }
    </style>
</head>

<body>

<h3 style="text-align:right;">Mẫu 04</h3>
<p><b>BỆNH VIỆN ĐA KHOA KHU VỰC TÂN CHÂU</b></p>

<h2 class="title">GIẤY BÁO SỬA CHỮA</h2>

<p><b>- Đơn vị báo sửa chữa:</b> {{ $report->department ?? 'N/A' }}</p>
<p><b>- Kính gửi:</b> {{ $report->sent_to ?? 'N/A' }}</p>

<table>
    <tr>
        <th>STT</th>
        <th>Đề nghị sửa chữa</th>
        <th>Đơn vị tính</th>
        <th>Số lượng (bằng số)</th>
        <th>Số lượng (bằng chữ)</th>
        <th>Địa điểm</th>
        <th>Tình trạng</th>
    </tr>

    <tr>
        <td>1</td>
        <td>{{ $report->device_name ?? 'N/A' }}</td>
        <td>{{ $report->unit ?? 'N/A' }}</td>
        <td>{{ $report->quantity ?? '0' }}</td>
        <td>{{ $report->quantity_text ?? 'N/A' }}</td>
        <td>{{ $report->location ?? 'N/A' }}</td>
        <td>{{ $report->device_status ?? 'N/A' }}</td>
    </tr>
</table>

<p><b>Giám định tình trạng hư hỏng:</b></p>
<p>{{ $report->description ?? 'Không có mô tả' }}</p>

{{-- Hiển thị kết quả đánh giá đã lưu --}}
@if($report->technician_evaluation || $report->evaluation_note)
    <h3><b>Kết quả đánh giá của kỹ thuật viên</b></h3>

    <p><b>Kỹ thuật viên thực hiện:</b>
        {{ $report->technician->name ?? 'Không xác định' }}
    </p>

    <p><b>Hướng xử lý:</b> {{ $report->technician_evaluation }}</p>

    <p><b>Ghi chú kỹ thuật:</b><br>
        {{ $report->evaluation_note }}
    </p>

    <hr>
@endif




{{-- Form đánh giá chỉ dành cho kỹ thuật viên --}}
@if(Auth::user()->role == 'technician')

    <h3><b>Đánh giá khả năng sửa chữa</b></h3>

    <form action="{{ route('fault_reports.evaluate', $report->id) }}" method="POST">
        @csrf

        <label><b>Hướng xử lý:</b></label><br>

        <label>
            <input type="radio" name="technician_evaluation" value="Sửa chữa nội bộ" required>
            Sửa chữa nội bộ
        </label><br>

        <label>
            <input type="radio" name="technician_evaluation" value="Gửi đi bảo trì bên ngoài" required>
            Gửi đi bảo trì bên ngoài
        </label><br><br>

        <label><b>Kiểm tra sơ bộ tình trạng thiết bị:</b></label><br>
        <textarea name="evaluation_note" rows="4" style="width:100%;"></textarea>

        <br><br>
        <button type="submit">✔ Lưu đánh giá</button>
    </form>

    <hr>
@endif

<br><br>

<div class="sign-col">
    <b>Ý kiến giải quyết Trưởng,<br>Phó phòng nơi nhận sửa chữa</b><br><br><br>
    ..................................................
</div>

<div class="sign-col">
    <b>Trưởng, Phó<br>Khoa/Phòng nơi đề nghị</b><br><br><br>
    ..................................................
</div>

<div class="sign-col">
    <b>Người đề nghị</b><br>
    ({{ $report->user->name ?? 'N/A' }})<br><br><br>
    ..................................................
</div>

<div class="clearfix"></div>

<br><br><br>

<h3 class="title">BAN GIÁM ĐỐC</h3>

<br><br>
<p><a href="{{ url('/fault-reports-all') }}">⬅ Quay lại danh sách</a></p>

</body>
</html>
