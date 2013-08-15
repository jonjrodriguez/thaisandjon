<?php

class RsvpsController extends BaseController {

    /**
     * Rsvp Repository
     *
     * @var Rsvp
     */
    protected $rsvp;

    protected $guest;

    public function __construct(Rsvp $rsvp, Guest $guest)
    {
        $this->beforeFilter('auth.basic');
        $this->rsvp = $rsvp;
        $this->guest = $guest;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rsvps = $this->rsvp->get();

        $rsvp_count = $this->rsvp->where('attending', 'attending')->count();
        $guest_count = $this->guest->count();
        $total_count = $rsvp_count + $guest_count;

        return View::make('rsvps.index', compact('rsvps', 'total_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('rsvps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Rsvp::$admin_rules);

        if ($validation->passes())
        {
            $this->rsvp->create($input);

            return Redirect::route('rsvps.index');
        }

        return Redirect::route('rsvps.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $rsvp = $this->rsvp->findOrFail($id);

        return View::make('rsvps.show', compact('rsvp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $rsvp = $this->rsvp->find($id);

        if (is_null($rsvp))
        {
            return Redirect::route('rsvps.index');
        }

        return View::make('rsvps.edit', compact('rsvp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), array('_method', 'guest'));
        $validation = Validator::make($input, Rsvp::$admin_rules);

        if ($validation->passes())
        {
            $rsvp = $this->rsvp->find($id);
            $rsvp->update($input);
            $rsvp->guests()->delete();

            $guests = Input::get('guest');

            if(isset($guests)) {
                foreach($guests as $name) {
                    if(trim($name) != "") {
                        $guest = new Guest(array('name' => $name));
                        $guest = $rsvp->guests()->save($guest);
                    }
                }
            }

            return Redirect::route('rsvps.show', $id);
        }

        return Redirect::route('rsvps.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->rsvp->find($id)->delete();

        return Redirect::route('rsvps.index');
    }

}