<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\category;
class categoriesController extends Controller
{

    public function permissionCheck(){
        $this_user_permission = $this->user_permission();
        if(!in_array('category', $this_user_permission)){
            return false;
        }else{
            return $this_user_permission;
        }
    }  
    public function index(){
        $permission_page = $this->permissionCheck();
        if($permission_page){
            $categories = category::orderBy('created_at','desc')->get();
        	return view('admin.category.index',compact('categories'));
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
    public function add(){
        $permission_page = $this->permissionCheck();
        if($permission_page){
            return view('admin.category.add');

        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
    public function show($id){
        $permission_page = $this->permissionCheck();
        if($permission_page){
            if($id){
                $category = category::find($id);
                if($category){
                    $posts = $category->posts()->paginate(10);
                    return view('admin.category.show',compact('category','posts'));
                }
            }
            return view('admin.error.error-404');
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }

    }
    public function edit($id){

        $permission_page = $this->permissionCheck();
        if($permission_page){
            if($id){
                $category = category::find($id);
                if($category){
                    return view('admin.category.edit',compact('category'));
                }
            }
            return view('admin.error.error-404');

        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    	
    }
    public function store(Request $r){
        $permission_page = $this->permissionCheck();
        if($permission_page){
            $r->validate([
                'name' => 'required|unique:categories',
                'tag' => 'required',
                'description' => 'required',
                'user_id' => 'required'
            ]);
            $slug = str_replace(" ","-",$r->name);
            $category = new category;
            $category->name = $r->name;
            $category->tag = $r->tag;
            $category->description = $r->description;
            $category->user_id = $r->user_id;
            $category->slug = $slug;
            $category->save();
        	return redirect()->route('categories')->with('success','category added success!');

        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }

    }
    public function update(Request $r){
        $permission_page = $this->permissionCheck();
        if($permission_page){
            $r->validate([
                'name' => 'required|unique:categories,name,'.$r->id,
                'description' => 'required',
                'tag' => 'required',
                'user_id' => 'required'
            ]);

            $category = category::find($r->id);
            $category->name = $r->name;
            $category->description = $r->description;
            $category->tag = $r->tag;
            $category->save();
        	return back()->with('success','category updated success!');
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
    public function delete(Request $r){
        $permission_page = $this->permissionCheck();
        if($permission_page){
            category::find($r->id)->delete();
            DB::table('category_post')->where('category_id',$r->id)->delete();
            return response()->json(['success'=>'category delete success']);
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
}
