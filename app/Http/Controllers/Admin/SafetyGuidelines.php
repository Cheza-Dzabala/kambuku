<?php

namespace App\Http\Controllers\Admin;

use App\safety_guidelines;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SafetyGuidelines extends Controller
{
    /**
     * @var safety_guidelines
     */
    private $guidelines;

    /**
     * Display a listing of the resource.
     *
     * @param safety_guidelines $guidelines
     */
    public function __construct(safety_guidelines $guidelines)
    {
        $this->middleware('admin');
        $this->guidelines = $guidelines;
    }

    public function index()
    {
        //
        $guides = safety_guidelines::orderBy('id', 'DESC')->get()->toArray();

        return view('admin.safety_guidelines.show', compact('guides'));
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
    public function store(Request $request)
    {
        //
        if (isset($request['is_active']))
        {
            $request->request->add(['is_active' => '1']);
        }else{
            $request->request->add(['is_active' => '0']);
        }
        //dd(\Request::input());
        safety_guidelines::create([
            'guide' => $request['guide'],
            'order' => $request['order'],
            'title' => $request['title'],
            'is_active' => $request['is_active']
        ]);

        $request->session()->flash('message', 'Guide Successfully Created');
        return redirect()->back();
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
