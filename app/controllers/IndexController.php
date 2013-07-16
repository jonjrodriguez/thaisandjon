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

            if($rsvp->attending == "not-attending") {
                $rsvp->guests()->delete();
            }

            return Redirect::action('IndexController@getGuest')
                ->with('rsvp_id', $rsvp->id);
        }

        return Redirect::action('IndexController@getRsvp')
                ->withInput(Input::except('attending'))
                ->withErrors($validation);
    }

    public function getGuest()
    {
        $rsvp = Rsvp::find(Session::get('rsvp_id', Input::old('rsvp_id')));

        if(!$rsvp) {
            return Redirect::action('IndexController@getRsvp')
                ->with('message', 'If you wish to add guests, please go through the RSVP process.');
        }

        if($rsvp->attending == "not-attending" || $rsvp->guests == 0) {
            return Redirect::action('IndexController@getSuccess')
                ->with('rsvp_id', $rsvp->id);;
        }

        $this->layout->content = View::make('index.guest')
            ->with('rsvp', $rsvp);
    }

    public function postGuest()
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

        return Redirect::action('IndexController@getSuccess')
                ->with('rsvp_id', $rsvp->id);
    }

    public function getSuccess()
    {
        $rsvp = Rsvp::find(Session::get('rsvp_id'));

        if(!$rsvp) {
            return Redirect::action('IndexController@getRsvp')
                ->with('message', 'Sorry, no party crashers, please go through the RSVP process.');
        }

        $this->layout->content = View::make('index.success')
            ->with('rsvp', $rsvp);
    }

}