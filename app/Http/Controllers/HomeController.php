<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacultyUsers;
use App\ImageUpload;
use App\Userlog;
use Illuminate\Support\Facades\DB;
use Schema;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Auth;



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
        return view('content');
    }

    public function search_page(){
        $u = Auth::user()->roles->pluck('name');
        //return dd(Auth::user()->id,$u,$u[0]);
        $log = new Userlog(['log_name' => 'Index',
        'description' => '',
        'subject_id' => Auth::id(),
        'subject_role' => $u[0]]);
        $log->save();
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

    public function Packages_register(){
        
        $columns = Schema::getColumnListing('package52');
        //return dd($id);
        return view('regis',compact('columns'));
    }

    public function store(Request $request)
    {
        $u = Auth::user()->roles->pluck('name');
        //return dd(Auth::user()->id,$u,$u[0]);
        $log = new Userlog(['log_name' => 'Index',
        'description' => '',
        'subject_id' => Auth::id(),
        'subject_role' => $u[0]]);
        $log->save();

        $this->validate($request,['รหัส' => 'required']);
        
        if($request->hasFile('file'))
        {  
            $files = $request->file('file');
            //return dd($files);
            foreach($files as $f){
                //return dd($f);
                $imageName = $f->getClientOriginalName();
                $f->move(public_path('upload'), $imageName);
                $path = 'upload/'.$imageName;
                $img = new ImageUpload(['Package_Id' =>$id,'path' => $path]);
                $img->save();
            }
            
            // = $request->image->storeAs('path/to/save/the/file', $imageName);
            
        }

        //$columns = Schema::getColumnListing('package52');
        //DB::table('package52')->where('รหัส','=',$id)->update(['รหัส' => $request->get('รหัส')]);
        
        return back()->with('success','update successful');
        
    }

    public function edit($id)
    {
        //$log = new Userlog('create','','','');
        $value=DB::table('package52')->where('Id','=',$id)->get();
        $path=DB::table('image_uploads')->select('Id','path')->where('Package_Id','=',$id)->get();
        //$path = (array)$path;
        $columns = Schema::getColumnListing('package52');
        //return dd($path,$id);
        if($path)
            return view('edit',compact('value','columns','id','path'));
        else
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
        
        
        if($request->hasFile('file'))
        {  
            $files = $request->file('file');
            //return dd($files);
            foreach($files as $f){
                //return dd($f);
                $imageName = $f->getClientOriginalName();
                $f->move(public_path('upload'), $imageName);
                $path = 'upload/'.$imageName;
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

    public function delimg($id)
    {
        $img = ImageUpload::find($id);
        $img->delete();
        return back()->with("success","Element has been deleted");
    }
}
