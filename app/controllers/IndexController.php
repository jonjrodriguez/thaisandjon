<?php

class IndexController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    
    public function getIndex()
    {
        $this->layout->content = View::make('home.index');
    }

    public function getRsvp()
    {
        $this->layout->content = View::make('home.rsvp')
            ->with('message', Session::get('message'));
    }

    public function postRsvp()
    {
        $input = Input::all();
        $validation = Validator::make($input, RSVP::$rules, RSVP::$messages);

        if ($validation->passes())
        {
            $rsvp = RSVP::where('name', $input['name'])->first();
            $rsvp->update($input);

            return Redirect::action('IndexController@getRsvp')
                ->withInput(Input::except('attending'))
                ->with('message', "Thanks for RSVP'ing. If you wish to change any of the submitted information, do it below.  
                    Or you can always come back to our site and submit your RSVP again.");
        }

        return Redirect::action('IndexController@getRsvp')
            ->withInput(Input::except('attending'))
            ->withErrors($validation);
    }

}