<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Simulasi data tangkapan sensor IoT AquaNode dari hardware
        $sensorData = [
            'suhu' => 29.5,
            'ph'   => 8.1,
            'oksigen' => 5.8,
            'status' => 'Bahaya - Oksigen Rendah!',
            'lokasi' => 'Kelong Galang, Batam'
        ];

        // Mengirim data ke file index.blade.php yang ada di dalam folder dashboard
        return view('dashboard.index', compact('sensorData'));
    }
}