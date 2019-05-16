<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class PostController extends Controller
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
        $posts = DB::table('posts')->orderBy('id','DESC')->paginate(3);
        return view('index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'author' => 'required',
        ]);
        $name = $request ->get('name');
        $detail = $request ->get('detail');
        $author = $request ->get('author');
        $posts = DB::insert('insert into posts(name, detail, author) value(?,?,?)',[$name,$detail,$author]);
        if($posts){
            $red = redirect('posts')->with('success','Data has been added');
        }else{
            $red = redirect('posts/create')->with('danger','Input data Failed, please try again');
        }
        return $red;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = DB::select('select * from posts where id=?',[$id]);
        return view('show',['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 

        $posts = DB::select('select * from posts where id=?', [$id]);
        return view('edit',['posts' => $posts]);
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
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'author' => 'required',
        ]);
       $name = $request ->get('name');
        $detail = $request ->get('detail');
        $author = $request ->get('author');
        $posts = DB::update('update posts set name=?, detail=?, author=? where id=?',[$name,$detail,$author,$id]);
        if($posts){
            $red = redirect('posts')->with('success','Data has been Updated');
        }else{
            $red = redirect('posts/edit/'.$id)->with('danger','Error Update, please try again');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = DB::delete('delete from posts where id=?', [$id]);
        $red = redirect('posts');
        return $red;
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $posts = DB::table('posts')->where('name','like','%'.$search.'%')->paginate(5);
        return view('index',['posts'=>$posts]);
    }

      public function deleteAll(Request $request)
    {
        $ids = $request->get('ids');
        $dbs = DB::delete('delete from posts where id in ('.implode(",",$ids).')');
        return redirect('posts');
    }
}
