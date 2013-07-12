<?php

class Guest extends Eloquent {
    protected $guarded = array('id', 'rsvp_id');

    public static $rules = array(
    	'name' => array('required'),
    );

    public static $messages = array(
    	'name.required' => "Hey, if you want someone to come with you, enter their name!"
	);

	public function rsvp()
    {
        return $this->belongsTo('Rsvp');
    }
}