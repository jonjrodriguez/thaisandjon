@section('content')
    
<section class="large-10 small-centered columns">

	<h2>RSVP</h2>

    <p>Thanks for submitting your RSVP.  You can review your information below. If you want to change your response or info, please go through the {{ link_to_action('IndexController@getRsvp', "RSVP") }} process again.  Or you can always come back and visit the {{ link_to('/', "home page") }} again.</p>

    <form>
	    <fieldset>
	    	<legend>RSVP Info</legend>

			@if($rsvp->attending === "attending")
				<div class="success">
    				<p class="attending">We look forward to seeing you on the big day!</p>
    			</div>
    		@else
    			<div class="error">
    				<p class="not-attending">Sorry you can't make it, but we'll keep you in our hearts.</p>
				</div>
    		@endif

		    <div class="large-8 columns small-centered">
		        {{ Form::text('name', $rsvp->name, array('placeholder'=>'Full Name', 'disabled' => 'disabled')) }}
		    </div>

		    <div class="large-8 columns small-centered">
		        {{ Form::text('phone', $rsvp->phone, array('placeholder'=>'Phone', 'disabled' => 'disabled')) }}
		    </div>

		    <div class="large-8 columns small-centered">
		        {{ Form::email('email', $rsvp->email, array('placeholder'=>'Email', 'disabled' => 'disabled')) }}
		    </div>

		    @if($rsvp->guests()->count() > 0)

		    <div class="large-8 columns small-centered">
		    	<h4>Guests</h4>
		        @foreach ($rsvp->guests()->get() as $guest)
					<?php $guest_num = 1; ?>
	            	
	            	{{ Form::text("guests[]", $guest->name, array('placeholder'=>"Guest $guest_num", 'disabled' => 'disabled')) }}

					<?php $guest_num++; ?>
				@endforeach
		    </div>

		    @endif

	    </fieldset>
    </form>

    <p class="columns small-centered">If you have any questions, please email us at <a href="mailto:rsvp@thaisandjon.com">rsvp@thaisandjon.com</a>.</p>

</section>

@stop