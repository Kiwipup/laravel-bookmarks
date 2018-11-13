<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bookmarks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Provide a form for creating a new bookmark";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create the new bookmark
        $b = new \App\Bookmark;
        $b->user_id = \Auth::id();
        $b->url = $request->input('new_url');
        $b->name = $request->input('new_name');
        $b->description = $request->input('new_description');
        $b->save();

        // Handle catalogue checkboxes
        foreach (preg_grep('/^catalogue_check_\d+/', array_keys($request->all())) as $check) {
            $id = intval(substr($check, 16));
            $b->catalogues()->attach($id);
        }

        // messaging
        $request->session()->flash('status', 'New bookmark added!');

        // redirect
        return redirect()->route('bookmarks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Display a bookmark in a non-editable way";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $b = \App\Bookmark::find($id);
        $temp = [];
        foreach ($b->catalogues as $c) {
            array_push($temp, $c->id);
        }
        $b->catalogue_ids = $temp;
        return view('bookmarks.edit', compact('b'));
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
        return "Save an updated bookmark";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $referer = request()->headers->get('referer');
        $force_delete = false;
        if ("/edit" == substr($referer, -5)) {
            $force_delete = true;
        }

        // Find bookmark
        $b = \App\Bookmark::find($id);

        // Does it belong to any catalogues?
        $count = $b->catalogues->count();
        if ($count) {
            if ($force_delete) {
                $b->catalogues()->detach();
            }
            else {
                $request->session()->flash('status_class', 'danger');
                $request->session()->flash('status', "This bookmark belongs to $count catalogue" . ($count > 1 ? 's' : '') . " and can't be deleted without confirmation. If you delete from this screen, it will be removed from those catalogues first, then deleted.");
                return redirect('/bookmarks/' . $b->id . '/edit');
            }
        }

        // Delete the bookmark
        $b->delete();

        // messaging
        $request->session()->flash('status', 'Bookmark deleted!');

        // redirect
        return redirect()->route('bookmarks.index');
    }
}
