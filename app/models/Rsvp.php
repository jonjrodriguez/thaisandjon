<?php

class Rsvp extends Eloquent {
    protected $guarded = array('id', 'name', 'guests');

    public static $rules = array(
    	'attending' => 'required',
    	'name' => array('required', 'exists:rsvps'),
    	'phone' => 'required',
    	'email' => 'email',
    );

    public static $messages = array(
    	'attending.required' => "Hey, pick whether you're joining us or not!",
    	'name.required' => "You forgot to type in your name.",
    	'name.exists' => "Sorry, but we can't find you on the guest list.  Please make sure to type in your name as it appeared on the invite.",
    	'phone.required' => "Enter your phone number in case we need to contact you.",
    	'email.email' => "That doesn't look like a real email address to us."
	);
}