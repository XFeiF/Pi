<?php

namespace App\Http\Controllers;

use App\Board;
use App\Cards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){
            // dump(Auth::user()->id);

            $boards = Board::where('user_id',Auth::user()->id)->get();
        
            return view('boards.index', ['boards' => $boards]);
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('boards.create');
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
            $board = Board::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id
            ]);
            if($board){
                return redirect()->route('boards.show',['board'=> $board->id])
                                 ->with('success','Board created successfully');
            }
        }

        return back()->withInput()->withErrors(['1'=>'Please Login first', '2'=>'Failed create board']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        //
        $board = Board::find($board->id);
        $board_c = 1;
        return view('boards.show', ['board' => $board, 'board_c' => $board_c]);
    }

    public function opening($id=1){
        $board = Board::find($id);
        return view('boards.show', ['board' => $board]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
        //
        $board = Board::find($board->id);
        return view('boards.edit', ['board' => $board]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board)
    {
        //
        $boardUpdate = Board::where("id",$board->id)
                                    ->update([
                                    'name' => $request->input('name'),
                                    'description' => $request->input('description')
                                    ]);
        if($boardUpdate){
            return redirect()->route('boards.index')
            ->with('success','Board updated successfully!');
        }

        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        //
        $findBoard = Board::find( $board->id);
    //     static::deleting(function($user) {
    //         $user->photos()->delete();
    //         $user->posts()->delete();
    //    });
        if($findBoard->delete()){
            return redirect()->route('boards.index')
                    ->with('success', 'Board deleted successfully');
        }

        return back()->withInput()->with('error', 'Board could not be deleted');
    }
}
