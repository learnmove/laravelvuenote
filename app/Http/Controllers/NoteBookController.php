<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NoteBook;
use App\User;
use App\Http\Requests\StoreNoteBook;
use Auth;
class NoteBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this->middleware('jwt.auth');
    }
    public function index()
    {
        //
        return NoteBook::with('user')->latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoteBook $request)
    {
        //
    

        $request['user_id']=Auth::user()->id;
        NoteBook::create($request->all());
        
        return 'success';
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //]
        $rquest['user_id']=1;
        Notebook::where('id',$id)->update($request->except('user','token'));
        return response()->json(['ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NoteBook::destroy($id);
        return response()->json(['delete']);
        
        //
    }
}
