<?php

namespace App\Http\Controllers;

use App\contentPages;
use App\contentPagesContent;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class renderContentController extends Controller
{
    //

    public function index($title)
    {
       // dd($title);

        $page = contentPages::whereTitle($title)->first();

        $content = contentPagesContent::where('contentPage_id', '=', $page->id)->first();

       // dd($content);

        return view('content.show', compact('page', 'content'));
    }
}
