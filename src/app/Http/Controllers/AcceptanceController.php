<?php

namespace App\Http\Controllers;

use App\Models\Acceptance;
use App\Models\InternalRepair;
use App\Models\ExternalRepair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AcceptanceController extends Controller
{
    public function create(): View
    {
        $internalDevices = InternalRepair::query()
            ->select('device_name')
            ->distinct()
            ->orderBy('device_name')
            ->pluck('device_name')
            ->values();

        $externalDevices = ExternalRepair::query()
            ->select('device_name')
            ->distinct()
            ->orderBy('device_name')
            ->pluck('device_name')
            ->values();

        return view('technician.acceptance_create', compact('internalDevices', 'externalDevices'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'repair_type' => 'required|in:internal,external',
            'device_name' => 'required|string|max:255',
            'repair_date' => 'required|date',
            'acceptance_result' => 'required|string',
        ]);

        // ✅ kiểm tra device_name thuộc đúng list theo repair_type
        $allowedDevices = $data['repair_type'] === 'internal'
            ? InternalRepair::query()->select('device_name')->distinct()->pluck('device_name')->toArray()
            : ExternalRepair::query()->select('device_name')->distinct()->pluck('device_name')->toArray();

        if (!in_array($data['device_name'], $allowedDevices, true)) {
            return back()
                ->withErrors(['device_name' => 'Thiết bị không thuộc danh sách sửa chữa đã chọn (nội bộ/bên ngoài).'])
                ->withInput();
        }

        Acceptance::create([
            'repair_type' => $data['repair_type'],
            'device_name' => $data['device_name'],
            'technician_name' => Auth::user()->name, // ✅ tự lấy theo tài khoản đăng nhập
            'repair_date' => $data['repair_date'],
            'acceptance_result' => $data['acceptance_result'],
            'accepted_by' => Auth::id(),
        ]);

        return back()->with('success', '✅ Nghiệm thu thiết bị thành công!');
    }

    public function index(): View
    {
        $acceptances = Acceptance::orderBy('created_at', 'desc')->get();
        return view('technician.acceptance_list', compact('acceptances'));
    }
}
