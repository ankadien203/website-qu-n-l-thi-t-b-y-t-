<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    // xem danh sách (ai cũng xem được)
    public function index()
    {
        $devices = Device::all();
        return view('devices.index', compact('devices'));
    }

    // form thêm thiết bị (chỉ technician)
    public function create()
    {
        return view('devices.create');
    }

    // lưu thiết bị (chỉ technician)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('devices', 'public');
        }

        Device::create([
            'name' => $request->name,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'location' => $request->location,
            'status' => 'active',
            'image' => $path,
        ]);

        return redirect()->route('devices.index');
    }

    // xóa (chỉ technician)
    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();
        return back();
    }
}
