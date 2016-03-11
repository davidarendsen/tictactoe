<?php

namespace App;

use App\Game;

class Tictactoe
{
	public $gameObject;

	public function __construct(Game $gameObject)
	{
		$this->gameObject = $gameObject;
	}

	public function getCurrentPlayerId()
	{
		if ($this->gameObject->round % 2 == 0) {
			return 2;
		}
		else {
			return 1;
		}
	}

	/**
	 * @return string
	 */
	public function getCurrentPlayerName()
	{
		if ($this->gameObject->round % 2 == 0) {
			return '(Speler 2) ' . $this->gameObject->player2;
		}
		else {
			return '(Speler 1) ' . $this->gameObject->player1;
		}
	}

	/**
	 * 
	 *
	 * @return string
	 */
	private function convertNumberToPlayerName($playerId)
	{
		if ($playerId == 1) {
			return '(Speler 1) ' . $this->gameObject->player1;
		}
		else {
			return '(Speler 2) ' . $this->gameObject->player2;
		}
	}

	/*
	 * Get the board from the game object and json decode it
	 * 
	 */
	public function getBoard()
	{
		return json_decode($this->gameObject->board);
	}

	public function updateBoard($row, $column)
	{
		$board = $this->getBoard();

		if ($board[$row][$column] == '') {
			$board[$row][$column] = $this->getCurrentPlayerId();
		}

		return $board;
	}

	/*
	 * Checks if any row is completed and returns the players name
	 */
	public function checkIfRowCompleted()
	{
		$board = $this->getBoard();

		// $board = [
		// 	['1', '2', '1'],
		// 	['2', '2', '1'],
		// 	['1', '2', '2']
		// ];

        //top row
        if ($board[0][0] and $board[0][0] == $board[0][1] and $board[0][1] == $board[0][2]) {
            return $this->convertNumberToPlayerName($board[0][0]);
        }

        //middle row
        if ($board[1][0] and $board[1][0] == $board[1][1] and $board[1][1] == $board[1][2]) {
            return $this->convertNumberToPlayerName($board[1][0]);
        }

        //bottom row
        if ($board[2][0] and $board[2][0] == $board[2][1] and $board[2][1] == $board[2][2]) {
            return $this->convertNumberToPlayerName($board[2][0]);
        }

        //first column
        if ($board[0][0] and $board[0][0] == $board[1][0] and $board[1][0] == $board[2][0]) {
            return $this->convertNumberToPlayerName($board[0][0]);
        }

        //second column
        if ($board[0][1] and $board[0][1] == $board[1][1] and $board[1][1] == $board[2][1]) {
            return $this->convertNumberToPlayerName($board[0][1]);
        }

        //third column
        if ($board[0][2] and $board[0][2] == $board[1][2] and $board[1][2] == $board[2][2]) {
            return $this->convertNumberToPlayerName($board[0][2]);
        }

        //diagonal 1
        if ($board[0][0] and $board[0][0] == $board[1][1] and $board[1][1] == $board[2][2]) {
            return $this->convertNumberToPlayerName($board[0][0]);
        }

        //diagonal 2
        if ($board[0][2] and $board[0][2] == $board[1][1] and $board[1][1] == $board[2][0]) {
            return $this->convertNumberToPlayerName($board[0][2]);
        }

        //return false by default
        return false;
	}
}