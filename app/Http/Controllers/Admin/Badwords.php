<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class Badwords extends Controller
{
    //

    public function index()
    {
        $badwords = \App\badwords::get();

        return view('admin.badwords.index', compact('badwords'));

    }

    public function new_filter()
    {
        return view('admin.badwords.new');
    }


    public function saveWords(Request $request)
    {
       $filter = new \App\badwords();

        $filter->filter_name = $request->filter_name;
        $filter->words = $request->words;
        if(isset($request->is_active))
        {
            $filter->is_active = '1';
        }else{
            $filter->is_active = '0';
        }

        $filter->save();

        return redirect(route('admin.badwords'));

    }

    public function edit_filter($name)
    {

        $filter = \App\badwords::whereFilter_name($name)->first();

        return view('admin.badwords.edit', compact('filter'));
    }

    public function updateWords(Request $request)
    {
        //dd($request->id);
        $filter = \App\badwords::whereId($request->id)->first();


        $filter->filter_name = $request->filter_name;
        $filter->words = $request->words;
        if(isset($request->is_active))
        {
            $filter->is_active = '1';
        }else{
            $filter->is_active = '0';
        }

        $filter->save();

        return redirect(route('admin.badwords'));


    }

    public function delete($id)
    {
        $filter = \App\badwords::whereId($id)->first();

        $filter->delete();


        return redirect(route('admin.badwords'));
    }
}
