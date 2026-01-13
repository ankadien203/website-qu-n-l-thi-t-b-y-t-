<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\ExternalRepair;
use Illuminate\Support\Facades\Auth;
use App\Models\Device;


class ExternalRepairController extends Controller
{
    // Form xin báo giá
    public function create()
    {
        $devices = Device::orderBy('name')->get(['id', 'name']);
        return view('technician.repairs_external', compact('devices'));
    }

    // Danh sách xin báo giá
    public function index(): View
    {
        $quotes = ExternalRepair::orderBy('created_at', 'desc')->get();
        return view('technician.repairs_external_list', compact('quotes'));
    }

    // Lưu yêu cầu xin báo giá
    public function store(Request $request)
{
    $data = $request->validate([
        'device_name' => 'required|exists:devices,name',
        'quantity' => 'required|integer|min:1',
        'supplier_company' => 'required|string|max:255',
    ]);

    $data['requested_by'] = auth::id();
    $data['technician_name'] = auth::user()->name; // set từ server
    $data['status'] = 'pending';

    ExternalRepair::create($data);

    return back()->with('success', 'Đã gửi yêu cầu xin báo giá!');
}


}
