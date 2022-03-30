<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Auth;
use File;
use Illuminate\Support\Str;



class DataAsistenController extends Controller
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
        $data['dataUser'] = User::get();
        return view('backend.dataAsisten.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.dataAsisten.create');

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
        $hashed = Hash::make($request->password);
        $password2 = $request->password2;

        if(Hash::check($password2, $hashed)){
            //apabila password dan konfirmasinya benar
            if($request->photo){
                $photo = $request->photo;
                $str = Str::random(8);
                $getExt = $photo->getClientOriginalExtension();
                $namafile = $str.'.'.$getExt;
                $photo->move('avatar_asisten', $namafile);
            }
            //masukan data
            $store = User::create(array_merge($request->all(), ['password' => $hashed, 'photo' => $namafile]));
            if(!$store){
                return redirect()->route('createDataAss')->with('error','Data Added Failed');
            } else {
                return redirect()->route('indexDataAss')->with('success','Data Added successfully');
            }
        } else {
            //kalo password 1 dan konfirmasinya tidak sama
            return redirect()->route('createDataAss')->with('error','Password Doesn\'t Match');
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
        $data['edit'] = User::find($id);
        if(!$data['edit']){
            return redirect()->route('indexDataAss')->with('error','Data Not Found!');
        }
        return view('backend.dataAsisten.edit',$data);
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
        //cari user
        $update = User::find($id);

        // cek data
        if (!$update) {
            return redirect()->back()->with('error','Data Not Found!');
        }

        // cek ganti password
        if ($request->password) {
            $hashed = Hash::make($request->password);
            if (Hash::check($request->password2, $hashed)) {
                $passwordBaru = $hashed;
            }else{
                return redirect()->back()->with('error','Password Doesn\'t Match!');
            }
        }else{
            $passwordBaru = $update->password;
        }

        //cek update foto
        if ($request->hasFile('photo')) {
            $path = 'avatar_asisten/'.$update->photo;
            if (File::exists($path)) {
                File::delete($path);
            }

            $photo = $request->photo;
            $str = Str::random(8);
            $getExt = $photo->getClientOriginalExtension();
            $namafile = $str.'.'.$getExt;
            $photo->move('avatar_asisten', $namafile);
        }else{
            $namafile = $update->photo;
        }

        // update data
        $dataInput = array_merge($request->except(['_token','password2']),['password'=>$passwordBaru,'photo'=>$namafile]);

        $inputUpdate = User::updateOrCreate(['id'=>$id], $dataInput);

        if (!$inputUpdate) {
            return redirect()->back()->with('error','Update Data Error!');
        }else{
            return redirect()->route('indexDataAss')->with('success','Data Updated Successfully');
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
        //cek id
        $destroy = User::find($id);

        // cek data
        if (!$destroy) {
            return redirect()->route('indexDataAss')->with('error','Data Not Found!');
        }

        // kondisi hapus foto
        if ($destroy->photo) {
            $path = 'avatar_asisten/'.$destroy->photo;
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $destroy->delete();
        if (!$destroy) {
            return redirect()->route('indexDataAss')->with('error','Data Cannot Be Deleted!');
        }else{
            return redirect()->route('indexDataAss')->with('success','Data Has Been Deleted!');
        }
    }
}
