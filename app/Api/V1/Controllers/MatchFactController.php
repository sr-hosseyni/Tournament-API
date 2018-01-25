<?php

namespace Tournament\API\V1\Controllers;

use Doctrine\ORM\EntityManager;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tournament\Api\V1\InverseTransformers\MatchFactITransformer;
use Tournament\API\V1\Repositories\MatchFactRepository;
use Tournament\API\V1\Transformers\MatchFactTransformer;
use Tournament\Core\MatchManager;

class MatchFactController extends APIController
{
    /**
     *
     * @var MatchFactRepository
     */
    private $matchFactRepository;

    /**
     *
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em, MatchFactRepository $matchRepository)
    {
        $this->matchFactRepository = $matchRepository;
        $this->em = $em;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->matchFactRepository->findAll();

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
        /**
         * Its better to have url like XPOST /fact/[match_id]
         * and get $match (Instance of Match model) in this action
         */
        try {
            $matchFact = MatchFactITransformer::newInstance($this->em)
                ->transform($request->all());

            $match = $matchFact->getMatch();

            $manager = new MatchManager($match);
            $manager->addFact($matchFact);

            $this->em->persist($manager->getMatch());
            $this->em->flush();
            return $this->apiResponseSucces($matchFact, new MatchFactTransformer());
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
