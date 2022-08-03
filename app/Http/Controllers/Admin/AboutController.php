<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus;
use Carbon\Carbon;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $aboutus = Aboutus::all();
        return view('admin.about.index',compact('aboutus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'title' => 'required',
        'para1' => 'required',
        'para2' => 'required',
        'image' => 'required | mimes:jpeg,jpg,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);

        if(isset($image)){
            $currentDate=Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/about')) {
                mkdir('uploads/about',007,true);
            }
            $image->move('uploads/about',$imagename);
        }else{
            $imagename='default.png';
        }
        $aboutus = new Aboutus();
        $aboutus->title=$request->title;
        $aboutus->para1=$request->para1;
        $aboutus->para2=$request->para2;
        $aboutus->image=$imagename;

        $aboutus->save();
        return redirect()->route('about.index');
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
       $aboutus = Aboutus::find($id);
         if(file_exists('uploads/about/'.$aboutus->image)){
        unlink('uploads/about/'.$aboutus->image);
        $aboutus->delete();
        return redirect()->route('about.index');
       }
    }
}
