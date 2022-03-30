<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class KodeGeneratorController extends Controller
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
        $data['kodes'] = Kode::orderBy('created_at', 'DESC')
                                    ->join('users','kode.user_id','users.id')
                                    ->where('kode.user_id',Auth::id())
                                    ->select('kode.*','users.name')
                                    ->get();
        return view('backend.generator.index',$data);
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
    public function store($param)
    {
        //
        $kode = Str::random(8);
        $store = Kode::create(['kode' => $kode, 'user_id' => Auth::id()]);

        if(!$store){
            return redirect()->route('indexKode')->with('error','Generate Failed');
        }

        if ($param=='frommodule') {
            return redirect()->route('indexKode')->with('success','Generate successfully - '.$kode);
        }else {
            return redirect()->route('home')->with('success','Generate successfully - '.$kode);
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
