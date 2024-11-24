<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;

class CashierController extends Controller
{
    public function index()
    {
        return view("cashier.index");
    }

    public function getTables()
    {
        $tables = Table::all();
        $html = '';
        foreach ($tables as $table) {
            $html .= '<div class="col-md-2">';
        $html .= '<button class="btn btn-primary">';
        $html .= '<img src="'.url('images/table.png').'" class="img-fluid">';
        $html .= '<br>';
        $html .= '<span>'.$table->name.'</span>';
        $html .= '</button>';
        $html .= '</div>';
        }
        return $html;
    }
}
