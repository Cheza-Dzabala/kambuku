<?php

namespace App\Http\Controllers;

use App\categories;
use App\classifieds;
use App\sub_categories;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryController extends Controller
{
    //
    public function index($id, Request $request)
    {
      //  $id = $request['id'];
        $subcategory = sub_categories::whereId($id)->first();

        $category = categories::whereId($subcategory->category_id)->first();

        $listings = classifieds::orderBy('id', 'DESC')->whereSub_category_id($id)->get()->toArray();

        $items = collect($listings);

        $page =  $request['page'];

        $perPage = $request['perPage'];

        $listingsArray = new LengthAwarePaginator(
            $items->forPage($page, $perPage), $items->count(), $perPage, $page
        );

        $listingsArray->setPath('/category/'.$id);

      //  dd($listingsArray);
        return view('category.browse', compact('listingsArray', 'subcategory', 'category', 'perPage'));
    }
}
