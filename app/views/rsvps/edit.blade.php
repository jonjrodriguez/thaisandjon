@extends('layouts.master')

@section('content')
<div class="large-10 small-centered columns">
    <h2>Edit Rsvp</h2>

    @if ($errors->any())
        <ul class="error-panel">
            {{ implode('', $errors->all('<li>:message</li>')) }}
        </ul>
    @endif

    {{ Form::model($rsvp, array('method' => 'PATCH', 'route' => array('rsvps.update', $rsvp->id))) }}
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

        @for ($i = 0; $i < $rsvp->guests; $i++)
            <?php $guest_num = $i + 1; ?>
            <?php $guest = $rsvp->guests()->skip($i)->first(); ?>

            <div class="row">
                <div class="small-2 columns">
                    {{ Form::label("guest-$guest_num", "Guest $guest_num:", array('class' => 'right inline')) }}
                </div>
                <div class="small-10 columns">
                    {{ Form::text("guest[]", $guest ? $guest->name : null, array('id' => "guest-$guest_num")) }}
                </div>
            </div>
        @endfor

        <div class="row">
            <div class="columns">
                {{ Form::submit('Update', array('class' => 'button secondary radius')) }}
                {{ link_to_route('rsvps.show', 'Cancel', $rsvp->id, array('class' => 'button radius')) }}
            </div>
        </div>
    {{ Form::close() }}

</div>

@stop