<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addCategory(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'bio' => 'required|min:10'
            //'password' => 'required|string|min:6',
            //'bio' =>'string|min:10'
        ]);
        return Category::create([
            'title' => $request['title'],
            'bio' => $request['bio'],
            'avatar' => $request['avatar'],
        ]);

    }
    public function addContact(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'email',
            'message' => 'required|min:10',
            //'password' => 'required|string|min:6',
            //'bio' =>'string|min:10'
        ]);
        return Category::create([
            
            'name' => $request['name'],
            'email' => $request['email'],
            'message' => $request['message'],
        ]);
    }
    public function all_category(){
        $categories = Category::all();
        return response()->json([
           "categories" => $categories
        ],200);
    }
    public function delete_category($id){
        $categories = Category::findOrFail($id);
        $categories->delete();
        return ['msg','delete with success!'];
    }
    public function edit_category($id){


      $cat = Category::findOrFail($id);
      return response()->json([
        'category' => $cat
      ],200);

    }
    public function update_category(Request $request, $id){
        $this->validate($request,[
            'title' => 'required|string',
            'bio' => 'required|min:10'
            //'password' => 'required|string|min:6',
            //'bio' =>'string|min:10'
        ]);
        $cat = Category::findOrFail($id);
        $cat->title = $request->title;
        $cat->bio = $request->bio;
        $cat->avatar = $request->avatar;
        $cat->save();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cherche_categorie(){
        $cherche = \Request::get('c');
        if($cherche!=null){
            $category = Category::where('title','LIKE',"%$cherche%")
                ->orWhere('bio','LIKE',"%$cherche%")
                ->get();
            return response()->json([
                'categories'=>$category
            ],200);
        }else{
           return $this->all_category();
        }
    }

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
