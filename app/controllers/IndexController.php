<?php

class IndexController extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    
    public function getIndex()
    {
        $this->layout->content = View::make('index.index');
    }

    public function getStory()
    {
        $this->layout->content = View::make('index.story');
    }

    public function getLocation()
    {
        $this->layout->content = View::make('index.location');
    }

    public function getSchedule()
    {
        $this->layout->content = View::make('index.schedule');
    }

    public function getRsvp()
    {
        $this->layout->content = View::make('index.rsvp')
            ->with('message', Session::get('message'));
    }

    public function postRsvp()
    {
        $input = Input::all();
        $validation = Validator::make($input, Rsvp::$rules, Rsvp::$messages);

        if ($validation->passes())
        {
            $rsvp = Rsvp::where('name', $input['name'])->first();
            $rsvp->update($input);

            return Redirect::action('IndexController@getGuests')
                ->with('rsvp_id', $rsvp->id);
        }

        return Redirect::action('IndexController@getRsvp')
                ->withInput(Input::except('attending'))
                ->withErrors($validation);
    }

    public function getGuests()
    {
        $rsvp = Rsvp::find(Session::get('rsvp_id', Input::old('rsvp_id')));

        if(!$rsvp) {
            return Redirect::to('/');
        }

        $this->layout->content = View::make('index.guests')
            ->with('rsvp', $rsvp)
            ->with('message', Session::get('message'));
    }

    public function postGuests()
    {
        $input = Input::all();

        $rsvp = Rsvp::find($input['rsvp_id']);
        $rsvp->guests()->delete();

        foreach($input['guests'] as $name) {
            if(trim($name) != "") {
                $guest = new Guest(array('name' => $name));
                $guest = $rsvp->guests()->save($guest);
            }
        }

        return Redirect::action('IndexController@getGuests')
            ->withInput()
            ->with('message', "Thanks for letting us know who's coming.  You can edit them below or go through the RSVP process again.  You know, in case you don't like them anymore.");
    }

}