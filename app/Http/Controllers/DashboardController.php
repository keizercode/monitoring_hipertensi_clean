<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\BloodPressureRecord;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // HAPUS filter user_id - tampilkan SEMUA pasien
        $totalPatients = Patient::count(); // Removed where('user_id', $user->id)
        
        // HAPUS filter user_id - tampilkan SEMUA pengukuran hari ini
        $todayRecords = BloodPressureRecord::whereDate('measurement_date', Carbon::today())->count();
        
        // HAPUS filter user_id - tampilkan SEMUA pasien terbaru
        $recentPatients = Patient::with('bloodPressureRecords')
            ->latest()
            ->take(5)
            ->get();
        
        // Chart data untuk SEMUA pasien (tidak per user lagi)
        $chartData = $this->getChartData();
        
        return view('dashboard', compact(
            'totalPatients', 
            'todayRecords', 
            'recentPatients',
            'chartData'
        ));
    }
    
    private function getChartData()
    {
        $months = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $months[$date->format('Y-m')] = [
                'month' => $date->format('F'),
                'systolic' => 0,
                'diastolic' => 0,
                'count' => 0
            ];
        }
        
        // HAPUS filter user_id - ambil SEMUA records
        $records = BloodPressureRecord::where('measurement_date', '>=', Carbon::now()->subMonths(6))
            ->get();
        
        foreach ($records as $record) {
            $key = $record->measurement_date->format('Y-m');
            if (isset($months[$key])) {
                $months[$key]['systolic'] += $record->systolic;
                $months[$key]['diastolic'] += $record->diastolic;
                $months[$key]['count']++;
            }
        }
        // Hitung rata - rata
        foreach ($months as &$month) {
            if ($month['count'] > 0) {
                $month['systolic'] = round($month['systolic'] / $month['count']);
                $month['diastolic'] = round($month['diastolic'] / $month['count']);
            }
        }
        
        return array_values($months);
    }
}