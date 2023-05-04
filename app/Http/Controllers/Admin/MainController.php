<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // Trang chủ admin
    public function index()
    {
        return view('admin.home', [
            'title' => 'Admin'
        ]);
    }
}
