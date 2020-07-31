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
        return view('home');
    }

    public function search_page(){
        $u = Auth::user()->roles->pluck('name');
        //return dd(Auth::user()->id,$u,$u[0]);
        $log = new Userlog(['log_name' => 'Index',
        'description' => '',
        'subject_id' => Auth::id(),
        'subject_role' => $u[0]]);
        $log->save();
        $columns = array('id',
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
        return view('search',compact(['value','columns']));
    }

    public function Packages_register(){
        
        $columns = Schema::getColumnListing('package52');
        //return dd($id);
        return view('regis',compact('columns'));
    }

    public function store(Request $request)
    {
        $this->validate($request,['รหัส' => 'required']);
        $ele = DB::table('package52')->select('รหัส')->where('รหัส','=',$request->get('รหัส'))->get();
        //return dd($ele);
        if(!$ele->isEmpty()){
            $u = Auth::user()->roles->pluck('name');
            //return dd(Auth::user()->id,$u,$u[0]);
            $log = new Userlog(['log_name' => 'Attemp_to_Create',
            'description' => 'duplicated with '.$request->get('รหัส'),
            'subject_id' => Auth::id(),
            'subject_role' => $u[0]]);
            $log->save();
            return back()->with('failed','รหัสนี้มีอยู่ในระบบอยู่แล้ว');
        }
        $u = Auth::user()->roles->pluck('name');
        //return dd(Auth::user()->id,$u,$u[0]);
        $log = new Userlog(['log_name' => 'Create',
        'description' => $request->get('รหัส'),
        'subject_id' => Auth::id(),
        'subject_role' => $u[0]]);
        $log->save();
        DB::table('package52')->where('#')->insert([
            'วนราชการ'  =>  'คณะวิศวะกรรมศาสตร์ สจล.',
            'หน่วยงาน'   =>  $request->get('หน่วยงาน'),
            'ประเภท'   =>  $request->get('ประเภท'),
            'รหัส'   =>  $request->get('รหัส'),
            'ยี่ห้อ'   =>  $request->get('ยี่ห้อ'),
            'ชื่อผู้ขาย'   =>  $request->get('ชื่อผู้ขาย'),
            'ที่อยู่ผู้ขาย'   =>  $request->get('ที่อยู่ผู้ขาย'),
            'เบอร์ผู้ขาย'   =>  $request->get('เบอร์ผู้ขาย'),
            'ประเภทเงิน'   =>  $request->get('ประเภทเงิน'),
            'วิธีการได้มา'   =>  $request->get('วิธีการได้มา'),
            'วันเดือนปี'   =>  $request->get('วันเดือนปี'),
            'เอกสารเลขที่'   =>  $request->get('เอกสารเลขที่'),
            'ชื่อรายการ'   =>  $request->get('ชื่อรายการ'),
            'จำนวน'   =>  '1',
            'ราคาต่อหน่วย'   =>  $request->get('ราคาต่อหน่วย'),
            'อายุการใช้งาน'   =>  '',
            'อัตราค่าเสื่อมราคา'   =>  '',
            'ค่าเสื่อมราคาประจำปี'   =>  '',
            'ค่าเสื่อมราคาสะสม'   =>  '',
            'มูลค่าสุทธิ'   =>  '',
            'ประวัติค่าเสื่อม'   =>  '',
            'สถานะ'   =>  '',
            'รูปภาพ'   =>  '',
            'หมายเหตุ'   =>  '',
            'ตัวประกอบ'   =>  '',
            'เอกสารอ้างอิง'   =>  '',
            'ผู้จัดทำ'   =>  '',
            'ประวัติการซ่อม'   =>  '',
            'รูปการซ่อม'   =>  '',
            'แทงจำหน่าย'   =>  '',
            'เหตุผล'   =>  '',
       ]);
        
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
        
        return back()->with('success','เสร็จสิ้น');
        
    }

    public function show($id)
    {
        //$log = new Userlog('create','','','');
        $value=DB::table('package52')->where('id','=',$id)->get();
        $path=DB::table('image_uploads')->select('id','path')->where('Package_Id','=',$id)->get();
        //$path = (array)$path;
        $columns = Schema::getColumnListing('package52');
        //return dd($value);
        if($path)
            return view('show',compact('value','columns','id','path'));
        else
            return view('show',compact('value','columns','id'));
    }

    public function edit($id)
    {
        //$log = new Userlog('create','','','');
        $value=DB::table('package52')->where('id','=',$id)->get();
        $path=DB::table('image_uploads')->select('id','path')->where('Package_Id','=',$id)->get();
        //$path = (array)$path;
        $columns = Schema::getColumnListing('package52');
        //return dd($value);
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

        $u = Auth::user()->roles->pluck('name');
        //return dd(Auth::user()->id,$u,$u[0]);
        $log = new Userlog(['log_name' => 'Update',
        'description' => $request->get('รหัส'),
        'subject_id' => Auth::id(),
        'subject_role' => $u[0]]);
        $log->save();
        DB::table('package52')->where('id','=',$id)->limit(1)->update([
            'หน่วยงาน'   =>  $request->get('หน่วยงาน'),
            'ประเภท'   =>  $request->get('ประเภท'),
            'รหัส'   =>  $request->get('รหัส'),
            'ยี่ห้อ'   =>  $request->get('ยี่ห้อ'),
            'ชื่อผู้ขาย'   =>  $request->get('ชื่อผู้ขาย'),
            'ที่อยู่ผู้ขาย'   =>  $request->get('ที่อยู่ผู้ขาย'),
            'เบอร์ผู้ขาย'   =>  $request->get('เบอร์ผู้ขาย'),
            'ประเภทเงิน'   =>  $request->get('ประเภทเงิน'),
            'วิธีการได้มา'   =>  $request->get('วิธีการได้มา'),
            'วันเดือนปี'   =>  $request->get('วันเดือนปี'),
            'เอกสารเลขที่'   =>  $request->get('เอกสารเลขที่'),
            'ชื่อรายการ'   =>  $request->get('ชื่อรายการ'),
            'ราคาต่อหน่วย'   =>  $request->get('ราคาต่อหน่วย'),
       ]);
        
        
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
        DB::table('package52')->where('id', '=', $id)->delete();
        return back()->with("success","Element has been deleted");
    }

    public function delimg($id)
    {   
        //return dd($id);
        ImageUpload::find($id)->delete();
        return back()->with("success","Element has been deleted");
    }
}
