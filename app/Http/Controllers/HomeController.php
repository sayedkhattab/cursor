<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * عرض الصفحة الرئيسية للموقع
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('pages.home');
    }
    
    /**
     * عرض صفحة الملف الشخصي للمستخدم
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function profile()
    {
        return view('pages.profile');
    }
    
    /**
     * عرض لوحة تحكم المدير
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
} 