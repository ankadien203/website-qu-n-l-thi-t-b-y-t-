<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternalRepair;
use App\Models\Device;

class InternalRepairController extends Controller
{
    // Hiển thị form
    public function create()
    {
        $devices = Device::orderBy('name')->get(['id', 'name']);
        return view('technician.repairs_internal', compact('devices'));
    }

    // Lưu dữ liệu
    public function store(Request $request)
    {
        $data = $request->validate([
            'device_name' => 'required|exists:devices,name',
            'repair_date' => 'required|date',
            'fault' => 'required',
            'repair_content' => 'required',
        ]);

        // ✅ Không lấy technician_name từ form nữa (tránh ghi khống)
        $data['technician_name'] = $request->user()->name; // hoặc auth()->user()->name

        InternalRepair::create($data);

        return redirect('/technician/repairs/internal/list')
            ->with('success', 'Lưu sửa chữa nội bộ thành công!');
    }

    // Danh sách đã lưu
    public function index()
    {
        $repairs = InternalRepair::latest()->get();
        return view('technician.repairs_internal_list', compact('repairs'));
    }
}
