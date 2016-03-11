@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welkom</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Speel met 2 spelers het bekende boter, kaas en eieren spel. <br /><br />

                    <a href="{{ url('/games/create') }}">Klik hier</a> om een nieuw spel te starten.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
