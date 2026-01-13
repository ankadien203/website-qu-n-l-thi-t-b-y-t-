<?php

namespace App\Http\Controllers;

use App\Models\FaultReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaultReportController extends Controller
{
    public function index()
    {
        $reports = FaultReport::where('user_id', Auth::id())->get();
        return view('fault_reports.index', compact('reports'));
    }

    public function create($device_id = null)
{
    $device = null;

    if ($device_id) {
        $device = \App\Models\Device::find($device_id);
    }

    return view('fault_reports.create', compact('device'));
}


    public function store(Request $request)
{
    $request->validate([
        'description'    => 'required',
        'department'     => 'required',
        'sent_to'        => 'required',
        'device_name'    => 'required',
        'unit'           => 'required',
        'quantity'       => 'required|numeric|min:1',
        'quantity_text'  => 'required',
        'location'       => 'required',
        'device_status'  => 'required',
    ]);

    FaultReport::create([
        'user_id'        => Auth::id(),
        'device_id'      => $request->device_id,
        'device_name'    => $request->device_name,
        'unit'           => $request->unit,
        'quantity'       => $request->quantity,
        'quantity_text'  => $request->quantity_text,
        'location'       => $request->location,
        'device_status'  => $request->device_status,   //  ĐÃ SỬA
        'department'     => $request->department,
        'sent_to'        => $request->sent_to,
        'description'    => $request->description,
        'status'         => 'pending',
    ]);

    return redirect()->route('fault_reports.index')
                     ->with('success', 'Đã gửi báo cáo hỏng hóc!');
}

    public function allReports()
{
    $reports = \App\Models\FaultReport::with('user')->orderBy('created_at', 'desc')->get();
    return view('fault_reports.all', compact('reports'));
}
    public function show($id)
{
    $report = FaultReport::with('user')->findOrFail($id);

    return view('fault_reports.show', compact('report'));
}
    public function inspectionList()//thêm
{
    $reports = FaultReport::with('user')->orderBy('created_at', 'desc')->get();
    return view('technician.inspection_list', compact('reports'));
}
    public function inspectionDetail($id)//thêm
{
    $report = FaultReport::with('user')->findOrFail($id);
    return view('technician.inspection_detail', compact('report'));
}
    public function technicianCheck()
{
    $reports = \App\Models\FaultReport::with('user')
                ->orderBy('created_at', 'desc')
                ->get();

    return view('technician.check', compact('reports'));
}
//     public function evaluate(Request $request, $id)
// {
//     $request->validate([
//         'technician_evaluation' => 'required',
//     ]);

//     $report = FaultReport::findOrFail($id);

//     $report->technician_evaluation = $request->technician_evaluation;
//     $report->status = 'processing'; // cập nhật trạng thái nếu cần
//     $report->save();

//     return back()->with('success', 'Đã cập nhật đánh giá kỹ thuật viên!');
// }
    public function evaluate(Request $request, $id)
{
    $request->validate([
        'technician_evaluation' => 'required',
        'evaluation_note'       => 'nullable|string',
    ]);

    $report = FaultReport::findOrFail($id);

    $report->technician_evaluation = $request->technician_evaluation;
    $report->evaluation_note = $request->evaluation_note;

    // GHI LẠI AI LÀ TECHNICIAN
    $report->technician_id = Auth::id();

    $report->status = 'processing';
    $report->save();

    return back()->with('success', 'Đã cập nhật đánh giá kỹ thuật viên!');
}


}
