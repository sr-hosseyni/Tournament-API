<?php

namespace Tournament\API\V1\Controllers;
//use Tournament\Entities\Repositories\Tournament\TournamentRepository;


use Doctrine\ORM\EntityManager;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tournament\Api\V1\InverseTransformers\TournamentITransformer;
use Tournament\API\V1\Repositories\TournamentRepository;
use Tournament\API\V1\Transformers\TournamentsTransformer;
use Tournament\API\V1\Transformers\TournamentTransformer;
use Tournament\Core\Repositories\Criteria\Tournament\OpenTournaments;

class TournamentController extends APIController
{
    private $tournamentRepository;
    private $em;

    public function __construct(TournamentRepository $tournamentRepository, EntityManager $em)
    {
        $this->tournamentRepository = $tournamentRepository;
        $this->em = $em;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
//        $data = $this->tournamentRepository
//            ->newQueryBuilder('t')
////            ->openTournaments()
//            ->startedTournaments()
//            ->all();
//
//        var_dump($data);die;
//
//        return $this->apiResponseSucces($data);

        switch ($request->get('type', 'all')) {
            case 'open' :
                return response()->json(
                    $this->tournamentRepository
                    ->pushCriteria(new OpenTournaments())
                    ->all()
                );

            case 'all' :
//                return response()->json($this->tournamentRepository->findAll());
                return $this->apiResponseSucces($this->tournamentRepository->findAll(), TournamentsTransformer::getInstance());
        }
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
        try {
            $tournament = TournamentITransformer::newInstance($this->em)
                ->transform($request->all());

            $this->em->persist($tournament);
            $this->em->flush();
            return $this->apiResponseSucces($tournament, new TournamentTransformer());
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
        $tournament = $this->em->getRepository(\Tournament\Entities\Tournament::class)->find($id);
        return $this->apiResponseSucces($tournament, new TournamentTransformer());
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
