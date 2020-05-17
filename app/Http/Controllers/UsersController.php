<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Users;
use Validator,File,Redirect,Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_user = DB::table('users')->get();
        return view('user.index', compact('ar_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required|max:45',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ],
        [
            'nama.required' => 'Nama User wajib diisi',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
            'role.required' => 'Role wajib diisi',
            'foto.image' => 'Ekstensi file yang boleh hanya jpg,jpeg,png',
            'foto.max' => 'Ukuran file foto terlalu besar, maksimal 2MB',
        ]
    );
    
        if(!empty($request->foto)) {
            $fileName = $request->name.'.'.$request->foto->extension();  
            $request->foto->move(public_path('img/user'), $fileName);
        } else { 
            $fileName = '';
        }

        DB::table('users')->insert(
            [
                'name'=>$request->nama,
                'email'=>$request->email,
                'password'=>$request->password,
                'role'=>$request->role,
                'foto'=>$fileName 
        ]);
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_user = DB::table('users')->where('users.id','=', $id)->get();
        return view('user.show', compact('ar_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Users::where('id', $id)->get();
        return view('user.form_edit', compact('data'));
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
        $validasi = $request->validate([
            'nama' => 'required|max:45',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ],
        [
            'nama.required' => 'Nama User wajib diisi',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
            'role.required' => 'Role wajib diisi',
            'foto.image' => 'Ekstensi file yang boleh hanya jpg,jpeg,png',
            'foto.max' => 'Ukuran file foto terlalu besar, maksimal 2MB',
        ]
    );
    
        if(!empty($request->foto)) {
            $fileName = $request->name.'.'.$request->foto->extension();  
            $request->foto->move(public_path('img/user'), $fileName);
        } else { 
            $fileName = '';
        }

        DB::table('users')->where('id',$id)->update(
            [
                'name'=>$request->nama,
                'email'=>$request->email,
                'password'=>$request->password,
                'role'=>$request->role,
                'foto'=>$fileName  
        ]);
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect('/user');
    }
}
