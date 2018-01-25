<?php

namespace Tournament\API\V1\Controllers;

use Illuminate\Http\Request;
use Tournament\Core\Repositories\Criteria\Invitation\ActiveInvitations;
use Tournament\Core\Repositories\Criteria\Invitation\MyInvitations;
use Tournament\Core\Repositories\InvitationRepository;
use Tournament\Entities\Invitation;
use Tournament\Properties\Fields;
use Tournament\Http\Controllers\Controller;
use Tournament\Http\Requests;
use Tournament\Transformers\V1\InvitationTransformer;

/**
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class InvitationController extends Controller
{

    private $invitationRepository;

    public function __construct(InvitationRepository $invitationRepository)
    {
        $this->invitationRepository = $invitationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->invitationRepository
            ->pushCriteria(new ActiveInvitations())
            ->pushCriteria(new MyInvitations())
            ->with(['referredUser', 'applierUser'])
            ->all();

        return $this->apiResponseSucces($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

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
        $invite->applier_user_id = auth()->user()->id;
        $invite->referred_user_id = $request->get(Fields::INVITATION_REFERRED_USER_ID);
        $invite->tournament_id = $request->get(Fields::INVITATION_TOURNAMENT_ID);

        if (!$invite->referred_user_id || !$invite->tournament_id || $invite->referred_user_id == $invite->applier_user_id) {
            return $this->apiResponseError();
        }

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
