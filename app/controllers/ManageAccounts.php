<?php
//not sure about CRUD operation based in the Account manager.

class ManageAccounts extends \BaseController
{
    public function __construct()
    {
        // call base controller constructor
        parent::__construct();

        //TODO: custom function to determine if admin
        $this->beforeFilter(function()
        {
            //check if user is admin
            if (Auth::user()->username == 'admin') {
                // $this->beforeFilter
            } else {
                return Redirect::to('/')->withErrors();
            }
            //if not, return response\error message
        });
    }

    /**
     * Display a listing of the resource.
     * GET /manageaccounts
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /manageaccounts/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /manageaccounts
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /manageaccounts/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /manageaccounts/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /manageaccounts/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /manageaccounts/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}