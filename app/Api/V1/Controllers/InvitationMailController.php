<?php

namespace Tournament\API\V1\Controllers;

use Illuminate\Http\Request;
use Tournament\Entities\Invitation;
use Tournament\Properties\Fields;
use Tournament\Http\Controllers\Controller;
use Tournament\Http\Requests;
use Tournament\Transformers\V1\InvitationTransformer;

class InvitationMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $invite = new Invitation();
        $invite->referred_mail = $request->get(Fields::INVITATION_REFERRED_MAIL);
        $invite->tournament_id = $request->get(Fields::INVITATION_TOURNAMENT_ID);
        $invite->applier_user_id = auth()->user()->id;

        if ($invite->save()) {
            return $this->apiResponseSucces($invite, new InvitationTransformer());
        } else {
            return $this->apiResponseError();
        }

    }

    /**
     * Display the specified resource.
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
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
