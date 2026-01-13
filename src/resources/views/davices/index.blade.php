<p>
    <a href="{{ url('/dashboard/technician') }}">⬅ Quay lại Dashboard</a>
</p>

<h2>Danh sách thiết bị (Davices)</h2>

@if(Auth::user()->role == 'technician')
    <a href="{{ route('davices.create') }}">➕ Thêm thiết bị</a>
@endif

<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Đơn vị</th>
        <th>Số lượng</th>
        <th>Vị trí</th>
        <th>Trạng thái</th>

        @if(Auth::user()->role == 'technician')
            <th>Xóa</th>
        @endif
    </tr>

    @foreach($davices as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td>{{ $d->name }}</td>
        <td>{{ $d->unit }}</td>
        <td>{{ $d->quantity }}</td>
        <td>{{ $d->location }}</td>
        <td>{{ $d->status }}</td>

        @if(Auth::user()->role == 'technician')
        <td>
            <form method="POST" action="{{ route('davices.destroy', $d->id) }}">
                @csrf
                @method('DELETE')
                <button>Xóa</button>
            </form>
        </td>
        @endif
    </tr>
    @endforeach
</table>
