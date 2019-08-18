<?php

namespace Tournament\API\V1\Controllers;

use Doctrine\ORM\EntityManager;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tournament\Api\V1\InverseTransformers\GroupITransformer;
use Tournament\API\V1\Repositories\GroupRepository;
use Tournament\API\V1\Transformers\GroupTransformer;
use Tournament\Entities\Group;
use Tournament\Entities\Team;

class GroupController extends APIController
{
    /**
     *
     * @var GroupRepository
     */
    private $groupRepository;

    /**
     *
     * @var EntityManager
     */
    private $em;

    public function __construct(GroupRepository $groupRepository, EntityManager $em)
    {
        $this->groupRepository = $groupRepository;
        $this->em = $em;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
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
        try {
            $group = GroupITransformer::newInstance($this->em)
                ->transform($request->all());

            $tm = new \Tournament\Core\TournamentManager($group->getStage()->getTournament());
            

            $this->em->persist($group);
            $this->em->flush();
            return $this->apiResponseSucces($group, new GroupTransformer());
        } catch (\Exception $ex) {
            return $this->apiResponseError($ex->getMessage());
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
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  int  $groupId
     * @return Response
     */
    public function addTeam(Request $request, $groupId)
    {
        /* @var $group Group */
        $group = $this->em->getReference(Group::class, $groupId);

        try {
            $teamIds = $request->get('teams');

            foreach ($teamIds as $teamId) {
                $team = $this->em->getReference(Team::class, $teamId);

                $group->addTeam($team);
            }

            $this->em->persist($group);
            $this->em->flush();

            return $this->apiResponseSucces($group, new GroupTransformer());
        } catch (\Exception $ex) {
            return $this->apiResponseError($ex->getMessage());
        }
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
