<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $category_repo;

    public function __construct(CategoryRepositoryInterface $category_repo)
    {
        $this->category_repo = $category_repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category_repo->get();
        return view('category', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validate request
         $this->validate($request, array(
            'name' => 'required|max:255|unique:categories,name',
        ));
        
        // save a new category
        $user_id = auth()->user()->id;
        $save_category = $this->category_repo->save($request, $user_id);

        if($save_category == true){
            return redirect()->back()->with('success', 'New Category has been created');
        }

        return redirect()->back()->with('error', 'An error occurred. Category not saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_category = $this->category_repo->delete($id);

        if($delete_category == true){
            return redirect()->back()->with('success', 'Category has been deleted');
        }

        return redirect()->back()->with('error', 'An error occurred. Category not deleted');
    }
}
