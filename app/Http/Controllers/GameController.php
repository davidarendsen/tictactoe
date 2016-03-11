<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\GameCreateRequest;

use App\Game;
use App\Tictactoe;

class GameController extends Controller
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
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameCreateRequest $request, Game $game)
    {
        $game->player1 = $request->input('player1');
        $game->player2 = $request->input('player2');
        $game->round = 1;
        $game->board = '[["","",""],["","",""],["","",""]]';

        $game->save();

        return redirect('/games/'.$game->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Game $game)
    {
        $game = $game->find($id);

        $tictactoe = new Tictactoe($game);

        $checkIfRowCompleted = $tictactoe->checkIfRowCompleted();
        if ($checkIfRowCompleted) {
            $game->winner = $checkIfRowCompleted;
            $game->save();

            return redirect('/')->with('status', $checkIfRowCompleted . ' heeft gewonnen!');
        }

        //if all columns are played
        if ($game->round >= 9) {
            return redirect('/')->with('status', 'Er zijn al 9 rondes gespeeld');
        }

        return view('games.show')
            ->with('game', $game)
            ->with('currentPlayerId', $tictactoe->getCurrentPlayerId())
            ->with('currentPlayer', $tictactoe->getCurrentPlayerName())
            ->with('board', $tictactoe->getBoard())
            ->with('winner', $checkIfRowCompleted);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Game $game)
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
    public function update(Request $request, Game $game, $id)
    {
        $game = $game->find($id);
        $tictactoe = new Tictactoe($game);
        $board = $tictactoe->getBoard();

        //input
        $row = $request->input('row', 0);
        $column = $request->input('column', 2);

        $newBoard = $tictactoe->updateBoard($row, $column);
        $game->board = json_encode($newBoard);
        $game->round = $game->round + 1;
        $game->save();

        return redirect('/games/'.$game->id);
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
