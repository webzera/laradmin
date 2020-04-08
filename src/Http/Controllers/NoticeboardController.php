<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Noticeboard;
use Auth;

class NoticeboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('checkrole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allnoticeboard=Noticeboard::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.noticeboard.index')->with([
            'allnoticeboard' => $allnoticeboard,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.noticeboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'notice_title'=> 'required',
            'notice_content'=> 'required',
            'notice_date' => 'required',
            'notice_class' => 'required',
            'notice_section' => 'required',
        ]);

        $noticeboard= new Noticeboard;

        $noticeboard->notice_title=$request->input('notice_title');
        $noticeboard->notice_content=$request->input('notice_content');
        $noticeboard->notice_date=$request->input('notice_date');
        if($request->input('notice_class')=='999')
            $noticeboard->notice_class='All Classes';
        else
            $noticeboard->notice_class=$request->input('notice_class');
        if($request->input('notice_section')=='999')
            $noticeboard->notice_section='All Sections';
        else
        $noticeboard->notice_section=$request->input('notice_section');
        
        $noticeboard->created_by=Auth::user()->id;
        $noticeboard->updated_by=Auth::user()->id;

        $noticeboard->save();

        flash('New noticeboard created For that date');
       return redirect('/admin/noticeboard')->with('success', 'New noticeboard created For that date');
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
        //
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
        $this->validate($request, [
            'notice_title'=> 'required',
            'notice_content'=> 'required',
            'notice_date' => 'required',
            'notice_class' => 'required',
            'notice_section' => 'required',
        ]);
        $noticeboard = Noticeboard::findOrFail($id);

        $noticeboard->notice_title=$request->input('notice_title');
        $noticeboard->notice_content=$request->input('notice_content');
        $noticeboard->notice_date=$request->input('notice_date');
        if($request->input('notice_class')=='999')
            $noticeboard->notice_class='All Classes';
        else
            $noticeboard->notice_class=$request->input('notice_class');
        if($request->input('notice_section')=='999')
            $noticeboard->notice_section='All Sections';
        else
        $noticeboard->notice_section=$request->input('notice_section');
        
        $noticeboard->created_by=Auth::user()->id;
        $noticeboard->updated_by=Auth::user()->id;

        $noticeboard->save();

        flash('New noticeboard updated For that date');
       return redirect('/admin/noticeboard')->with('success', 'New noticeboard updated For that date');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Noticeboard::destroy($id); 
        flash('Noticeboard Has Been Deleted');
        return redirect('/admin/noticeboard')->with('success', 'Noticeboard Has Been Deleted');
    }
}
