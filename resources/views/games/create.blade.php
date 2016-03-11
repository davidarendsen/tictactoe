@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nieuw spel starten</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/games') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('player1') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Speler 1</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="player1" placeholder="Naam speler 1" value="{{ old('player1') }}">

                                @if ($errors->has('player1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('player1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('player2') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Speler 2</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="player2" placeholder="Naam speler 2" value="{{ old('player2') }}">

                                @if ($errors->has('player2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('player2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Starten
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
