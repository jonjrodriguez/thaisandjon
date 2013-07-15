@section('content')
    
<section class="large-10 small-centered columns">

	<h2>RSVP</h2>

	@if (isset($message))
        <div class="success">
		    <p>{{ $message }}</p>
		</div>
    @endif

	@if($rsvp->attending === "attending")
    	<p class="attending">We look forward to seeing you on the big day!</p>
    @else
    	<p class="not-attending">Sorry you can't make it, but we'll keep you in our hearts.</p>
    @endif

    <p>Thanks for submitting your RSVP.  If you want to change your response or info, you can do so {{ link_to_action('IndexController@getRsvp', "here") }}.  Or you can always come back and visit the {{ link_to('/', "home page") }} again.</p>

</section>
    
@if( ($rsvp->attending === "attending") && ($rsvp->guests > 0))

	<div class="divider"><span></span></div>

	<section class="large-10 small-centered columns">

		<div class="success">
		    <p>It looks like we were being nice and allowed you {{ $rsvp->guests }} guest(s).  Type in their names below if you're bringing anyone.  If not, we'll keep you company.</p>
		</div>

		{{ Form::open(array('action' => 'IndexController@postGuest')) }}
			{{ Form::hidden('rsvp_id', $rsvp->id) }}

			@for ($i = 0; $i < $rsvp->guests; $i++)
				<?php $guest_num = $i + 1; ?>
				<?php $guest = $rsvp->guests()->skip($i)->first(); ?>
			    <div class="large-8 columns small-centered">
		            {{ Form::text("guests[]", $guest ? $guest->name : null, array('placeholder'=>"Guest $guest_num")) }}
		        </div>
			@endfor

		    <div class="large-8 columns small-centered">
		        {{ Form::submit("Submit +1's", array('class'=>'button secondary expand large')) }}
		    </div>

		{{ Form::close() }}
	</section>

@endif

    <p class="columns small-centered">If you have any questions, please email us at <a href="mailto:rsvp@thaisandjon.com">rsvp@thaisandjon.com</a>.</p>

@stop