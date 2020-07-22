<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacultyUsers;
use Illuminate\Support\Facades\DB;
use Schema;
use Kyslik\ColumnSortable\Sortable;


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
        $this->middleware('permission:home|search|package-create|package-delete|package-edit', ['only' => ['index']]);
        $this->middleware('permission:package-create', ['only' => ['store','Packages_register']]);
        $this->middleware('permission:package-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:package-delete', ['only' => ['destroy']]);
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
    public function search_page(){
        return ;
    }

    public function Packages_register(){
        $columns = Schema::getColumnListing('package52');
        //return dd($id);
        return view('regis',compact('columns'));
    }

    public function store(Request $request)
    {
        $this->validate($request,['user' => 'required','pass'=>'required']);
        
        $user = new FacultyUsers(['user' =>$request->get('user'),'pass' => $request->get('pass')]);
        $user->save();
        return back()->with('success','fuck u');
        //return $request->input();
    }

    public function edit($id)
    {
        $value=DB::table('package52')->where('รหัส','=',$id)->get();
        $columns = Schema::getColumnListing('package52');
        //return dd($id);
        return view('edit',compact('value','columns','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['รหัส' => 'required']);
        $columns = Schema::getColumnListing('package52');
        DB::table('package52')->where('รหัส','=',$id)->update(['รหัส' => $request->get('รหัส')]);
        
        return back()->with('success','update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$user = FacultyUsers::find($id);
        $user->delete();*/
        DB::table('package52')->where('รหัส', '=', $id)->delete();
        return back()->with("success","Element has been deleted");
    }
}
