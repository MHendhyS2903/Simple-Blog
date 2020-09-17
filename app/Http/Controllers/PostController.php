<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Label;
use App\Rating;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
    }

    public function post()
    {
        $post=Label::all();
        return view('post', compact('post'));
    }

    public function detail($postID)
    {
        $detail=Post::find($postID);
        $rate=Rating::where('postID', $postID)->get();
        $score=Rating::where('postID', $postID)->avg('rateValue');
        return view('post_detail', compact('detail', 'rate', 'score'));
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
        $id = Auth::id();
        $this->validate($request,[
            'judul' => 'required',
            'labelID' => 'required',
            'konten' => 'required',
            'foto' => 'required|image|mines:jpg,png,jpeg'
        ]);

        $foto = $request->file('foto');
        $nama_file = date('Y-m-d')."_".$foto->getClientOriginalName();
        // Post::make($foto)->backup();
        $tujuan_upload = 'img';
        $foto->move($tujuan_upload, $nama_file);



        Post::create([
            'judul' => $request->judul,
            'labelID' => $request->labelID,
            'id' => $id,
            'konten' => $request->konten,
            'foto' => $nama_file
        ]);
 
        return redirect('/');
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
    public function edit($postID)
    {
        $post=Post::find($postID);
        $label=Label::all();

        return view('edit', compact('post', 'label'));
    }

    public function delete($postID)
    {
        $delete = Post::find($postID);
        $delete->delete();
        return redirect('/mypost');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postID)
    {
        $this->validate($request,[
            'judul' => 'required',
            'labelID' => 'required',
            'konten' => 'required',
            'foto' => 'required'
    ]);

        $foto = $request->file('foto');
        $nama_file = date('Y-m-d')."_".$foto->getClientOriginalName();
        // Post::make($foto)->backup();
        $tujuan_upload = 'img';
        $foto->move($tujuan_upload, $nama_file);

    $update = Post::find($postID);
    $update->judul = $request->judul;
    $update->labelID = $request->labelID;
    $update->konten = $request->konten;
    $update->foto = $nama_file;
    $update->save();
    return redirect('/mypost');

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
