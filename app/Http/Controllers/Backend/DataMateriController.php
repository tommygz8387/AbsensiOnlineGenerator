<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;

class DataMateriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['materis'] = Materi::orderBy('created_at', 'DESC')->get();

        return view('backend.dataMateri.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.dataMateri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $store = Materi::create($request->all());

        if(!$store){
            return redirect()->route('createDataMat')->with('error', 'Add Data Failed!');
        }else{
            return redirect()->route('indexDataMat')->with('success', 'Data Added Successfully.');
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
        $data['edit'] = Materi::find($id);
        if(!$data['edit']){
            return redirect()->route('indexDataMat')->with('error', 'Data Not Found.');
        }else{
            return view('backend.dataMateri.edit', $data);
        }

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
        $update = Materi::updateOrCreate(['id' => $id], $request->all());
        if(!$update) {
            return redirect()->back()->with('error', 'Data Not Found!.');
        }else{
            return redirect()->route('indexDataMat')->with('success', 'Data Updated successfully.');
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
        //
        $destroy = Materi::find($id);
        if(!$destroy){
            return redirect()->route('indexDataMat')->with('error', 'Data Not Found.');
        }

        $destroy->delete();
        if(!$destroy) {
            return redirect()->route('indexDataMat')->with('error', 'Data Cannot Be Deleted.');
        }

        return redirect()->route('indexDataMat')->with('success', 'Data Has Been Deleted.');
    }
}
