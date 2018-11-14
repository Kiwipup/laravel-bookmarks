<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogues.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Display a form for creating a new catalogue";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create the new catalogue
        $c = new \App\Catalogue;
        $c->user_id = \Auth::id();
        $c->name = $request->input('new_name');
        $c->description = $request->input('new_description');
        $c->save();

        // Do we have a new bookmark?
        if ($request->input('bookmark_check_new') && $request->input('new_bookmark_url') != null) {

            // Create the new bookmark
            $b = new \App\Bookmark;
            $b->user_id = \Auth::id();
            $b->url = $request->input('new_bookmark_url');
            $b->save();

            // TODO: We should check that the catalogue was created successfully!

            // Attach it to this catalogue
            $c->bookmarks()->attach($b->id);
        }

        // Handle bookmark checkboxes
        foreach (preg_grep('/^bookmark_check_\d+/', array_keys($request->all())) as $check) {
            $id = intval(substr($check, 15));
            $c->bookmarks()->attach($id);
        }

        // messaging
        $request->session()->flash('status', 'New catalogue created!');

        // redirect
        return redirect()->route('catalogues.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Display a catalogue, but not for editing";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $c = \App\Catalogue::find($id);
        $temp = [];
        foreach ($c->bookmarks as $b) {
            array_push($temp, $b->id);
        }
        $c->bookmark_ids = $temp;
        return view('catalogues.edit', compact('c'));
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
        return "Save changes to an existing catalogue";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Delete a catalogue!";
    }
}
