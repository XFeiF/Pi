<?php

namespace App\Http\Controllers;

use App\Site;
use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        //
        if(Auth::check()){
            $site = Site::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'url'=> $request->input('url'),
                'logo'=> $request->input('logo'),
                'card_id' => $request->input('card_id')
            ]);
            if($site){
                return redirect()->route('boards.show',['board'=> $request->input('board_id')])
                                 ->with('success','Site added successfully');
            }
        }

        return back()->withInput()->withErrors(['1'=>'Please Login first', '2'=>'Failed create site']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
        $site = Site::find($site->id);
        return view('sites.edit', ['site' => $site]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        // save data
        $siteUpdate = Site::where("id",$site->id)
                                    ->update([
                                    'name' => $request->input('name'),
                                    'url' => $request->input('url'),
                                    'logo' => $request->input('logo'),
                                    'description' => $request->input('description')
                                    ]);
        $site = Site::find($site->id);
        $card_id = $site->card_id;
        $board_id = Card::find($card_id)->board_id;
        if($siteUpdate){
            return redirect()->route('boards.show',['board' => $board_id])
            ->with('success','Card updated successfully!');
        }

        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        $findSite = Site::find($site->id);
        if($findSite->delete()){
            return back()->with('success','Site deleted successfully');
        }

        return back()->withInput()->with('error', 'Board could not be deleted');
    }
}
