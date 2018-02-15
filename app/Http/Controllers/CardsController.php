<?php

namespace App\Http\Controllers;

use App\Card;
use App\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CardsController extends Controller
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
    public function create($board_id = null)
    {
        //
        $boards = null;
        if(!$board_id){
            $boards = Board::where('user_id',Auth::user()->id)->get();
        }
        
        return view('cards.create',['board_id'=>$board_id, 'boards'=>$boards]);
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
            $card = Card::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'board_id' => $request->input('board_id'),
                'user_id' => Auth::user()->id
            ]);
            if($card){
                return redirect()->route('boards.show',['board'=> $request->input('board_id')])
                                 ->with('success','Card created successfully');
            }
        }

        return back()->withInput()->withErrors(['1'=>'Please Login first', '2'=>'Failed create card']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
        $card = Card::find($card->id);
        return view('cards.edit', ['card' => $card]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        // save data
        $cardUpdate = Card::where("id",$card->id)
                                    ->update([
                                    'name' => $request->input('name'),
                                    'description' => $request->input('description')
                                    ]);
        $card = Card::find($card->id);
        $board_id = $card->board_id;
        if($cardUpdate){
            return redirect()->route('boards.show',['board' => $board_id])
            ->with('success','Card updated successfully!');
        }

        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
        // $success = del($card);
        $cardfind = Card::find($card->id);
        if ($cardfind->delete()){
            return back()->with('success', 'Card deleted successfully');
        }
        return back()->withInput()->with('error', 'Card could not be deleted');
    }

    
}
