<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = \App\Models\Enquiry::with('user', 'course')->get();
        return view('admin.dashboard', compact('enquiries'));
    }
}
