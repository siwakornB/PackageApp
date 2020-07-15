<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Schema;
use Illuminate\Http\Request;
use App\FacultyUsers;

class Userscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = FacultyUsers::all()->toArray();
        $value=DB::table('package52')->get();
        $columns = Schema::getColumnListing('users');
        return view('content',compact('value'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['user' => 'required','pass'=>'required']);
        
        $user = new FacultyUsers(['user' =>$request->get('user'),'pass' => $request->get('pass')]);
        $user->save();
        return back()->with('success','fuck u');
        //return $request->input();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $value=DB::table('package52')->where('รหัส','=',$id)->get();
        $columns = Schema::getColumnListing('package52');
        return dd($id);
        return view('edit',compact(['value','columns']));
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
        //
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
