<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use Illuminate\Support\Facades\Session;
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $notices=Notice::orderBy('id', 'desc')->paginate(5);
        return view('adminlte::notice.index')->withNotices($notices);

    }

    public function create(){
        return view('adminlte::notice.notice_home');
    }


    public function store(Request $request){
        $this->validate($request, array(
            'tittle'=>'required',
            'notice'=>'required'



        ));

        $notice = new Notice();
        $notice->tittle = $request->tittle;
        $notice->notice = $request->notice;

        $notice->save();
        Session::flash('success','Notice Created Succesfully');
        return redirect()->route('notice.show',$notice->id);

    }

    public function show($id){
        $notice=Notice::find($id);
        return view('adminlte::notice.show')->withNotice($notice);

    }
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
        //
    }
}
