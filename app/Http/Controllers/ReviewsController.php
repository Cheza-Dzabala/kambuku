<?php

namespace App\Http\Controllers;

use App\classifieds;
use App\comments;
use App\Events\NewCommentEvent;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Event;

class ReviewsController extends Controller
{
    /**
     * @var comments
     */
    private $comments;

    /**
     * Display a listing of the resource.
     *
     * @param comments $comments
     */

    public function __construct(comments $comments)
    {

        $this->comments = $comments;
    }

    public function index()
    {
        //
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
    public function store(Requests\CreateNewReview $request)
    {
        //
       // dd(\Request::Input());
        comments::create([
           'name' => $request['name'],
            'email' => $request['email'],
            'comment' => $request['comment'],
            'classified_id' => $request['classified_id']
        ]);

        $name = $request['name'];
        $email = $request['email'];
        $comment = $request['comment'];

        $classified_details = classifieds::whereId($request['classified_id'])
            ->first()->toArray();

        $title = $classified_details['title'];
        $target = $classified_details['user_id'];


        Event::fire(new NewCommentEvent($name, $email, $comment, $title, $target));

        return redirect()->back()->with('comment','Comment Added Successfully');
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
