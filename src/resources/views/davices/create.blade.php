<h2>Thêm thiết bị mới</h2>

<form method="POST" action="{{ route('davices.store') }}">
    @csrf

    <p>Tên thiết bị: <input name="name" required></p>
    <p>Đơn vị: <input name="unit"></p>
    <p>Số lượng: <input type="number" name="quantity" value="1"></p>
    <p>Vị trí: <input name="location"></p>
    <p>Trạng thái: <input name="status" value="active"></p>

    <button>Lưu</button>
</form>
