<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacultyUsers;
use App\ImageUpload;
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
        
        $columns = array('Id',
        'รหัส',
        'ยี่ห้อ',
        'ชื่อรายการ',
        'วันเดือนปี',
        'ราคาต่อหน่วย',
        );
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
        $this->validate($request,['รหัส' => 'required']);
        
        //$user = new ImageUpload(['รหัส' =>$request->get('user'),'path' => $request->get('pass')]);
        $imageName = request()->file->getClientOriginalName();
        return dd($request,$imageName);
        //return back()->with('success','fuck u');
        //return $request->input();
    }

    public function edit($id)
    {
        $value=DB::table('package52')->where('Id','=',$id)->get();
        $path=DB::table('image_uploads')->where('Id','=',$id)->get();
        $columns = Schema::getColumnListing('package52');
        //return dd($id);
        if($path == '')
            return view('edit',compact('value','columns','id'));
        else
            return view('edit',compact('value','columns','id','path'));
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
        
        
        if($request->hasFile('file'))
        {  
            $files = $request->file('file');
            //return dd($files);
            foreach($files as $f){
                //return dd($f);
                $imageName = $f->getClientOriginalName();
                $path = $f->move(public_path('upload'), $imageName);
                $img = new ImageUpload(['Package_Id' =>$id,'path' => $path]);
                $img->save();
            }
            
            // = $request->image->storeAs('path/to/save/the/file', $imageName);
            
        }

        //$columns = Schema::getColumnListing('package52');
        //DB::table('package52')->where('รหัส','=',$id)->update(['รหัส' => $request->get('รหัส')]);
        
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
