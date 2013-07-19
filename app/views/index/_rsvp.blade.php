<section id="rsvp" class="large-10 small-centered columns">
    <h2>RSVP</h2>
    <p class="large-10 columns small-centered">We would be pleased if you would join us on this special occasion.  We know that even
    if you can’t make it, you will be with us in spirit.</p>

    @if ($errors->any())
        <ul class="error-panel">
            {{ implode('', $errors->all('<li>:message</li>')) }}
        </ul>
    @endif

    {{ Form::open(array('action' => 'IndexController@postRsvp', 'class' => 'parsley-form custom', 'id' => 'rsvp_form', 'novalidate' => 'novalidate')) }}
    
        <div class="row rsvp">
            <div class="large-6 columns">
                {{ Form::radio('attending', "attending", false, array('id' => 'rsvp1')) }} 
                {{ Form::label('rsvp1', "Wouldn't miss it for the world") }}
            </div>

            <div class="large-6 columns">
                {{ Form::radio('attending', "not-attending", false, array('id' => 'rsvp2', 'data-required' => 'true', 'data-error-message' => "Hey, pick whether you're joining us or not!")) }}
                {{ Form::label('rsvp2', "Will be celebrating from afar") }}
            </div>
        </div>

        <div class="large-8 columns small-centered">
            {{ Form::text('name', Input::old('name'), array('placeholder'=>'Full Name', 'data-required' => 'true', 'data-error-message' => "Sorry, but we can't find you on the guest list.  Please make sure to type in your name as it appeared on the invite.")) }}
        </div>

        <div class="large-8 columns small-centered">
            {{ Form::text('phone', Input::old('phone'), array('placeholder'=>'Phone', 'data-required' => 'true', 'data-type' => 'phone', 'data-error-message' => "Enter your phone number in case we need to contact you.")) }}
        </div>

        <div class="large-8 columns small-centered">
            {{ Form::email('email', Input::old('email'), array('placeholder'=>'Email', 'data-type' => 'email', 'data-error-message' => "That doesn't look like a real email address to us.")) }}
        </div>

        <div class="large-8 columns small-centered">
            {{ Form::submit('Submit RSVP!', array('class'=>'button secondary expand large')) }}
        </div>

    {{ Form::close() }}

    <p class="columns small-centered">If you have any issues submitting your RSVP, please email us at <a href="mailto:rsvp@thaisandjon.com">rsvp@thaisandjon.com</a>.</p>
</section>