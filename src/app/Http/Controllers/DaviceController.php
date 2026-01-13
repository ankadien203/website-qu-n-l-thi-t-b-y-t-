<?php

namespace App\Http\Controllers;

use App\Models\Davice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaviceController extends Controller
{
    public function index()
    {
        $davices = Davice::all();
        return view('davices.index', compact('davices'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'technician') {
            abort(403);
        }
        return view('davices.create');
    }

    public function store(Request $request)
    {
        Davice::create($request->all());
        return redirect()->route('davices.index')->with('success', 'Đã thêm thiết bị!');
    }

    public function destroy($id)
    {
        if (Auth::user()->role !== 'technician') {
            abort(403);
        }

        Davice::findOrFail($id)->delete();
        return back()->with('success', 'Đã xóa thiết bị!');
    }
}
