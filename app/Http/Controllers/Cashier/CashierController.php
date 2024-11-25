<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Category;
use App\Models\Menu;

class CashierController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("cashier.index")->with('categories', $categories);
    }

    public function getTables()
    {
        $tables = Table::all();
        $html = '';
        foreach ($tables as $table) {
            $html .= '<div class="col-md-2 mb-4">';
        $html .= '<button class="btn btn-primary btn-table" data-id="'.$table->id.'" data-name="'.$table->name.'">';
        $html .= '<img src="'.url('images/table.png').'" class="img-fluid">';
        $html .= '<br>';
        $html .= '<span>'.$table->name.'</span>';
        $html .= '</button>';
        $html .= '</div>';
        }
        return $html;
    }

    public function getMenusByCategory($category_id)
    {
        $menus = Menu::where('category_id', $category_id)->get();
        $html = '';
        foreach ($menus as $menu) {
           $html.='
              <div class="col-md-4 mb-4 text-center">
              <a class="btn btn-outline-secondary" data-id="'.$menu->id.'">
              <img src="'.url('/menu_images/'.$menu->image).'" class="img-fluid menu-image ">
              <br>
                <span>'.$menu->name.'</span>
                <br>
                <span>Rp. '.number_format($menu->price).'</span>
              </a>
                </div>

              ';
    }
    return $html;
    }
}
