<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Language::orderBy('name','asc')->get();
        return view('admin.language_list', compact('results'));
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
    public function store(Request $request)
    {
        $this->validate($request,['name' => 'required']);
        $row = new Language();
        $row->name = $request->name;
        if($row->save()) {
            return redirect()->route('admin.languages.index')->with(setAlert('success','New Language Added Successfully'));
        } else {
            return redirect()->route('admin.languages.index')->with(setAlert('warning','Something Wrong'));
        }
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
        $this->validate($request,['name' => 'required']);
        $row = Language::findOrFail($id);
        $row->name = $request->name;
        if($row->save()) {
            return redirect()->route('admin.languages.index')->with(setAlert('info',' Language Updated Successfully'));
        } else {
            return redirect()->route('admin.languages.index')->with(setAlert('warning','Something Wrong'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Language::findOrFail($id)->delete();
        return redirect()->route('admin.languages.index')->with(setAlert('danger','Language Deleted Successfully'));
    }
}
