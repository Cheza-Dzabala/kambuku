<?php

namespace App\Http\Controllers\Admin;

use App\classifieds;
use App\sub_categories;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\categories;

class CategoryAdminController extends Controller
{
    //
    /**
     * @var categories
     */
    private $categories;
    /**
     * @var sub_categories
     */
    private $sub_categories;
    /**
     * @var classifieds
     */
    private $classifieds;

    /**
     * CategoryAdminController constructor.
     * @param categories $categories
     * @param sub_categories $sub_categories
     * @param classifieds $classifieds
     */
    public function __construct(categories $categories, sub_categories $sub_categories, classifieds $classifieds)
    {
        $this->middleware('admin');
        $this->categories = $categories;
        $this->sub_categories = $sub_categories;
        $this->classifieds = $classifieds;
    }

    public function index()
    {



        $categories_array = $this->Get_Category_data();


       //dd($categories_array);


        return view('admin.categories.categories', compact('categories_array', 'perPage', 'page'));
    }


    public function GetSubCategory($id)
    {

       // dd($id);
        $subcat_id = $id;

        list($subcats, $catname) = $this->get_subcategory_data($id);


        return view('admin.categories.subcategories.subcategories', compact('subcats', 'catname', 'subcat_id'));
    }


    public function CreateSubCategory($id)
    {
        //dd($id);
        $category = categories::whereId($id)->get()->first();

        return view('admin.categories.subcategories.createnewsubcategory', compact('category'));
    }

    public function SaveSubCategory(Requests\AdminNewSubCategoryRequest $request)
    {
        sub_categories::create([
            'name' => $request['name'],
            'fa_icons' => $request['fa_icons'],
            'category_id' => $request['category_id'],
        ]);
        $request->session()->flash('message', 'Subcategory Successfully Added');
        return redirect()->back();

    }

    public function CreateCategory(Requests\AdminNewSubCategoryRequest $request)
    {
        categories::create([
            'name' => $request['name'],
            'fa_icons' => $request['fa_icons'],
            'display_order' => $request['display_order']
        ]);

        $request->session()->flash('message', 'Category Successfully Added');
        return redirect()->back();
    }


    public function DeleteCategory($id, Request $request)
    {
        $category = categories::findorFail($id);

        $category->delete();

       $request->session()->flash('message', 'Category Successfully Deleted');
       return redirect()->back();
    }

    public function EditCategory($id)
    {
        $category = categories::findorFail($id);

      //  dd($category);

        return view('admin.categories.editcategory', compact('category'));
    }

    public function UpdateCategory(Request $request)
    {
        //dd(\Request::Input());
        if (isset($request['is_tabbed']))
        {
            $request->request->add(['is_tabbed' => '1']);
        }else{
            $request->request->add(['is_tabbed' => '0']);
        }

        //dd($request);
        $category = categories::findorFail($request['category_id']);

        $input = $request->all();

        //dd($input);
        $category->fill($input)->save();

        $request->session()->flash('message', 'Category Successfully Updated');
        return redirect()->back();
    }


    public function EditSubCategory($id)
    {
        $subcategory = sub_categories::findorFail($id);

      //  dd($category);

        return view('admin.categories.subcategories.editsubcategories', compact('subcategory'));
    }

    public function UpdateSubCategory(Request $request)
    {
        //dd(\Request::Input());

        $subcategory = sub_categories::findorFail($request['subcategory_id']);

        $input = $request->all();
        $subcategory->fill($input)->save();

        $request->session()->flash('message', 'Subcategory Successfully Updated');
        return redirect()->back();
    }

    public function DeleteSubCategory($id, Request $request)
    {
        $subcategory = sub_categories::findorFail($id);

        $subcategory->delete();

        $request->session()->flash('message', 'Category Successfully Deleted');
        return redirect()->back();
    }


    /**
     * @return array
     */
    private function Get_Category_data()
    {
        $categories = $this->categories->orderBy('display_order', 'ASC')->get()->toArray();

        //dd($categories);
        $categories_array = array();
            $i = 0;
        // dd($categories);
        foreach ($categories as $key => $value) {

            $subcats_number = sub_categories::whereCategory_id($value['id'])->count();
            $display_order = $value['display_order'];
            $stats = array('subcategories' => $subcats_number, 'display_order' => $display_order, 'category_id' => $value['id'], '#' => $i);
            $categories_array = array_add($categories_array, $value['name'], $stats);
            $i++;
        }
       //dd($categories_array);
        return $categories_array;
    }

    /**
     * @param $id
     * @return array
     */
    private function get_subcategory_data($id)
    {
        $subcats_init = sub_categories::whereCategory_id($id)->orderBy('id', 'DESC')->get()->toArray();
        $subcats = array();
        $i = 0;
        $numbering = array();
        foreach ($subcats_init as $key => $value)
        {
            $numbering = array('#' => $i);
            $merged = array_merge($value, $numbering);
            $subcats = array_add($subcats, $key,$merged);
            $i++;
        }

        //dd($subcats);
        $catname = categories::whereId($id)->get()->first();
        return array($subcats, $catname);
    }

    /**
     * @param $cat
     * @param $page
     * @param $perPage
     * @return array
     */

    /**
     * @param Request $request
     * @param $subcats
     * @param $id
     * @return array
     */



}
