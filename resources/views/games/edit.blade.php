@extends('layouts.app')
@section('content')

    @if ($errors->any())

        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>
        </div>

    @endif

    {!! Form::open(['route' => ['games.update', $game], 'method' => 'put']) !!}

    <div class="form-group">

        {{ Form::label('second_player_name', 'Second player', ['class' => 'mt-2']) }}

        {{ Form::text('second_player_name', old('second_player_name'), ['class' => 'form-control'
            . ($errors->has('second_player_name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}

        @if ($errors->has('second_player_name'))
            <div class="invalid-feedback">

                {{ $errors->first('second_player_name') }}

            </div>
        @endif

    </div>

    {!! Form::submit('Start', ['class' => 'btn btn-primary mt-2']) !!}

    {!! Form::close() !!}

@endsection
