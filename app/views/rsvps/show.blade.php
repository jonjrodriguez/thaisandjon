@extends('layouts.master')

@section('content')

<h2>Show Rsvp</h2>

<p>{{ link_to_route('rsvps.index', 'Return to all rsvps') }}</p>

<div class="columns">
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Attending</th>
            <th>Guests</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $rsvp->name }}}</td>
			<td>{{{ $rsvp->email }}}</td>
			<td>{{{ $rsvp->phone }}}</td>
			<td>{{{ $rsvp->attending }}}</td>
			<td>{{{ $rsvp->guests }}}</td>
            <td>{{ link_to_route('rsvps.edit', 'Edit', array($rsvp->id), array('class' => 'button radius secondary')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('rsvps.destroy', $rsvp->id))) }}
                    {{ Form::submit('Delete', array('class' => 'button alert radius')) }}
                {{ Form::close() }}
            </td>
        </tr>

        @foreach ($rsvp->guests()->get() as $guest)
                    <tr>
                        <td>{{ $guest->name }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
    </tbody>
</table>
</div>

@stop