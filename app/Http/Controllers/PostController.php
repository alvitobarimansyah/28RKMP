<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use Validator,File,Redirect,Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_post = DB::table('post')->get();
        return view('post.index', compact('ar_post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.form');
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
            'bahan' => 'required',
            'cara' => 'required',
            'author' => 'required',
            'tglposting' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ],
        [
            'nama.required' => 'Resep wajib diisi',
            'nama.max' => 'Resep maksimal 45 karakter',
            'bahan.required' => 'Bahan - Bahan wajib diisi',
            'cara.required' => 'Cara Pembuatan wajib diisi',
            'author.required' => 'Nama Author wajib diisi',
            'tglposting.required' => 'Tanggal Posting wajib diisi',
            'foto.image' => 'Ekstensi file yang boleh hanya jpg,jpeg,png',
            'foto.max' => 'Ukuran file foto terlalu besar, maksimal 2MB',
        ]
    );
    
        if(!empty($request->foto)) {
            $fileName = $request->nama.'.'.$request->foto->extension();  
            $request->foto->move(public_path('img/post'), $fileName);
        } else { 
            $fileName = '';
        }

        DB::table('post')->insert([
            'nama'=>$request->nama,
            'bahan'=>$request->bahan,
            'cara'=>$request->cara,
            'author'=>$request->author,
            'tglPosting'=>$request->tglposting,
            'foto'=>$fileName
        ]);
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_post =DB::table('post')->where('post.id','=', $id)->get();
        return view('post.show', compact('ar_post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::where('id', $id)->get();
        return view('post.form_edit', compact('data'));
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
            'bahan' => 'required',
            'cara' => 'required',
            'author' => 'required',
            'tglposting' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ],
        [
            'nama.required' => 'Resep wajib diisi',
            'nama.max' => 'Resep maksimal 45 karakter',
            'bahan.required' => 'Bahan - Bahan wajib diisi',
            'cara.required' => 'Cara Pembuatan wajib diisi',
            'author.required' => 'Nama Author wajib diisi',
            'tglposting.required' => 'Tanggal Posting wajib diisi',
            'foto.image' => 'Ekstensi file yang boleh hanya jpg,jpeg,png',
            'foto.max' => 'Ukuran file foto terlalu besar, maksimal 2MB',
        ]
    );
    
        if(!empty($request->foto)) {
            $fileName = $request->nama.'.'.$request->foto->extension();  
            $request->foto->move(public_path('img/post'), $fileName);
        } else { 
            $fileName = '';
        }

        DB::table('post')->where('id', $id)->update([
            'nama'=>$request->nama,
            'bahan'=>$request->bahan,
            'cara'=>$request->cara,
            'author'=>$request->author,
            'tglPosting'=>$request->tglposting,
            'foto'=>$fileName
        ]);
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = DB::table('post')->select('foto')
                ->where('id', $id)->get();
        foreach($foto as $f) {
            $namaFile = $f->foto;
        }

        File::delete(public_path('img/post/'.$namaFile));

        DB::table('post')->where('id', $id)->delete();
        return redirect('post');
    }
}