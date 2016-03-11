@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Spel {{ $game->id }} | {{ $game->player1 }} tegen {{ $game->player2 }}</div>
                <div class="panel-body">

                    @if ($winner)
                        <div class="alert alert-success" role="alert">
                            {{ $winner }} heeft gewonnen!
                        </div>
                    @else
                        <table border="1px">
                            <tr>
                                <td>
                                    @if ($board[0][0] == '')
                                        <a href="{{ url('/games/'.$game->id.'/update') }}?row=0&column=0">
                                            <img src="{{ asset('empty.png') }}" />
                                        </a>
                                    @elseif ($board[0][0] == '1')
                                        <img src="{{ asset('player1.png') }}" />
                                    @elseif ($board[0][0] == '2')
                                        <img src="{{ asset('player2.png') }}" />
                                    @endif
                                </td>
                                <td>
                                    @if ($board[0][1] == '')
                                        <a href="{{ url('/games/'.$game->id.'/update') }}?row=0&column=1">
                                            <img src="{{ asset('empty.png') }}" />
                                        </a>
                                    @elseif ($board[0][1] == '1')
                                        <img src="{{ asset('player1.png') }}" />
                                    @elseif ($board[0][1] == '2')
                                        <img src="{{ asset('player2.png') }}" />
                                    @endif
                                </td>
                                <td>
                                    @if ($board[0][2] == '')
                                        <a href="{{ url('/games/'.$game->id.'/update') }}?row=0&column=2">
                                            <img src="{{ asset('empty.png') }}" />
                                        </a>
                                    @elseif ($board[0][2] == '1')
                                        <img src="{{ asset('player1.png') }}" />
                                    @elseif ($board[0][2] == '2')
                                        <img src="{{ asset('player2.png') }}" />
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @if ($board[1][0] == '')
                                        <a href="{{ url('/games/'.$game->id.'/update') }}?row=1&column=0">
                                            <img src="{{ asset('empty.png') }}" />
                                        </a>
                                    @elseif ($board[1][0] == '1')
                                        <img src="{{ asset('player1.png') }}" />
                                    @elseif ($board[1][0] == '2')
                                        <img src="{{ asset('player2.png') }}" />
                                    @endif
                                </td>
                                <td>
                                    @if ($board[1][1] == '')
                                        <a href="{{ url('/games/'.$game->id.'/update') }}?row=1&column=1">
                                            <img src="{{ asset('empty.png') }}" />
                                        </a>
                                    @elseif ($board[1][1] == '1')
                                        <img src="{{ asset('player1.png') }}" />
                                    @elseif ($board[1][1] == '2')
                                        <img src="{{ asset('player2.png') }}" />
                                    @endif
                                </td>
                                <td>
                                    @if ($board[1][2] == '')
                                        <a href="{{ url('/games/'.$game->id.'/update') }}?row=1&column=2">
                                            <img src="{{ asset('empty.png') }}" />
                                        </a>
                                    @elseif ($board[1][2] == '1')
                                        <img src="{{ asset('player1.png') }}" />
                                    @elseif ($board[1][2] == '2')
                                        <img src="{{ asset('player2.png') }}" />
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @if ($board[2][0] == '')
                                        <a href="{{ url('/games/'.$game->id.'/update') }}?row=2&column=0">
                                            <img src="{{ asset('empty.png') }}" />
                                        </a>
                                    @elseif ($board[2][0] == '1')
                                        <img src="{{ asset('player1.png') }}" />
                                    @elseif ($board[2][0] == '2')
                                        <img src="{{ asset('player2.png') }}" />
                                    @endif
                                </td>
                                <td>
                                    @if ($board[2][1] == '')
                                        <a href="{{ url('/games/'.$game->id.'/update') }}?row=2&column=1">
                                            <img src="{{ asset('empty.png') }}" />
                                        </a>
                                    @elseif ($board[2][1] == '1')
                                        <img src="{{ asset('player1.png') }}" />
                                    @elseif ($board[2][1] == '2')
                                        <img src="{{ asset('player2.png') }}" />
                                    @endif
                                </td>
                                <td>
                                    @if ($board[2][2] == '')
                                        <a href="{{ url('/games/'.$game->id.'/update') }}?row=2&column=2">
                                            <img src="{{ asset('empty.png') }}" />
                                        </a>
                                    @elseif ($board[2][2] == '1')
                                        <img src="{{ asset('player1.png') }}" />
                                    @elseif ($board[2][2] == '2')
                                        <img src="{{ asset('player2.png') }}" />
                                    @endif
                                </td>
                            </tr>
                        </table>
                    @endif  

                </div>
                <div class="panel-footer">
                    {{ $currentPlayer }} is nu aan de beurt
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
