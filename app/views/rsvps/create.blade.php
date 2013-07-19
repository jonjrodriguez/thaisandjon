@extends('layouts.master')

@section('content')
<div class="large-10 small-centered columns">
    <h2>Create Rsvp</h2>

    @if ($errors->any())
        <ul class="error-panel">
            {{ implode('', $errors->all('<li>:message</li>')) }}
        </ul>
    @endif

    {{ Form::open(array('route' => 'rsvps.store')) }}
        <div class="row">
            <div class="small-2 columns">
                {{ Form::label('name', 'Name:', array('class' => 'right inline')) }}
            </div>
            <div class="small-10 columns">
                {{ Form::text('name') }}
            </div>
        </div>

        <div class="row">
            <div class="small-2 columns">
                {{ Form::label('email', 'Email:', array('class' => 'right inline')) }}
            </div>
            <div class="small-10 columns">
                {{ Form::text('email') }}
            </div>
        </div>

        <div class="row">
            <div class="small-2 columns">
                {{ Form::label('phone', 'Phone:', array('class' => 'right inline')) }}
            </div>
            <div class="small-10 columns">
                {{ Form::text('phone') }}
            </div>
        </div>

        <div class="row">
            <div class="small-2 columns">
                {{ Form::label('attending', 'Attending:', array('class' => 'right inline')) }}
            </div>
            <div class="small-10 columns">
                {{ Form::text('attending') }}
            </div>
        </div>

        <div class="row">
            <div class="small-2 columns">
                {{ Form::label('guests', 'Guests:', array('class' => 'right inline')) }}
            </div>
            <div class="small-10 columns">
                {{ Form::text('guests') }}
            </div>
        </div>

        <div class="row">
            <div class="columns">
                {{ Form::submit('Submit', array('class' => 'button secondary radius')) }}
                {{ link_to_route('rsvps.index', 'Cancel', null, array('class' => 'button radius')) }}
            </div>
        </div>
    {{ Form::close() }}
</div>
@stop


