<?php

class Rsvp extends Eloquent {
    protected $guarded = array(id, name, attending);

    public static $rules = array(
    	'name' => array('required', 'exists:rsvps'),
    	'phone' => 'required',
    	'email' => 'email'
    );
}