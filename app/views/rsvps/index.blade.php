@extends('layouts.master')

@section('content')

<h2>All Rsvps - {{ $total_count }}</h2>

<p>{{ link_to_route('rsvps.create', 'Add new rsvp') }}</p>

<div class="columns">
@if ($rsvps->count())
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
            @foreach ($rsvps as $rsvp)
                <tr>
                    <td>{{ link_to_route('rsvps.show', $rsvp->name, array($rsvp->id)) }}</td>
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
            @endforeach
        </tbody>
    </table>
@else
    <p>There are no rsvps</p>
@endif
</div>

@stop