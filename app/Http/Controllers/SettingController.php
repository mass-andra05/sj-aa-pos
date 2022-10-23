<?php

namespace App\Http\Controllers;
use App\Models\Setting;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting.index',[
            'title' => "Profile Mart",
            'settings' => setting::all()
        ]);
        
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->nama_perusahaan = $request->nama_perusahaan;
        $setting->telepon = $request->telepon;
        $setting->alamat = $request->alamat;

        $setting->update();

        return redirect('setting')->with('success', 'Selamat Data Berhasil di Update!!');
    }
}
