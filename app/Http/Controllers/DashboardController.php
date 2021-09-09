<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller{
    public $meta = [
        'title' => 'Dashboard',
    ];

    public function index(){
        
        $total_customer = Party::customer()->count();
        $total_supplier = Party::supplier()->count();
        $total_receiveable = Party::receiveable()->sum('balance');
        $total_payable = Party::payable()->sum('balance');
        $total_stock = $total_receiveable - $total_payable;
        

        return view('dashboard', compact('total_supplier', 'total_customer', 'total_receiveable','total_payable', 'total_stock'))->with('meta', $this->meta);
    }
}
