<?php

namespace App\Http\Controllers\Admin;

use App\contentHeaders;
use App\contentPages;
use App\contentPagesContent;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class contentPagesController extends Controller
{
    //
    public function headerIndex()
    {
        $headers = contentHeaders::get();

        return view('admin.contentPages.headers.index', compact('headers'));
    }

    public function newHeader()
    {
        return view('admin.contentPages.headers.new');
    }

    public function saveHeader(Request $request)
    {
        //dd($request);

        if(isset($request->is_active))
        {
            $active = 1;
        }else{
            $active = 0;
        }

        $header = new contentHeaders();

        $header->title = $request->title;
        $header->order = $request->order;
        $header->is_active = $active;

        $header->save();

        return redirect(route('admin.contentHeaders'));
    }


    public function pagesIndex($id)
    {
        $header = contentHeaders::whereId($id)->first();

        $pages = contentPages::whereHeader_id($id)->get();

        return view('admin.contentPages.pages.index', compact('header', 'pages'));

    }

    public function pagesNew($id)
    {
        $header = contentHeaders::whereId($id)->first();

        return view('admin.contentPages.pages.new', compact('header'));

    }

    public function savePage(Request $request)
    {
        $page = new contentPages();

        if(isset($request->is_active))
        {
            $active = 1;
        }else{
            $active = 0;
        }

        $page->header_id = $request->header_id;
        $page->title = $request->title;
        $page->order = $request->order;
        $page->is_active = $active;

        $page->save();

        return redirect(route('admin.pagesIndex', $request->header_id));

    }

    public function contentNew($id)
    {
        $page = contentPages::whereId($id)->first();

        $content = contentPagesContent::where('contentPage_id', '=', $id)->first();

        if($content != null)
        {
            return view('admin.contentPages.content.edit', compact('page', 'content'));
        }else{
            return view('admin.contentPages.content.new', compact('page'));
        }



    }

    public function contentSave(Request $request)
    {

        $contentPage = new contentPagesContent();

        $contentPage->contentPage_id = $request->contentPage_id;
        $contentPage->content = $request['content'];
        $contentPage->save();

        return redirect()->back();

    }

    public function contentUpdate(Request $request)
    {
        $contentPage = contentPagesContent::where('contentPage_id', '=', $request->contentPage_id)->first();

        $contentPage->content = $request['content'];
        $contentPage->save();

        return redirect()->back();
    }
}
