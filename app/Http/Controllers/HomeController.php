<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacultyUsers;
use Illuminate\Support\Facades\DB;
use Schema;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $columns = array('รหัส',
        'ยี่ห้อ',
        'วันเดือนปี',
        'ราคาต่อหน่วย',
        'หน่วยงาน');
        $value=DB::table('package52')->select($columns)->get();
        //$columns = Schema::getColumnListing('package52');
        //$value = $value->toArray();
        //return dd($value);
        return view('content',compact(['value','columns']));
    }
}
