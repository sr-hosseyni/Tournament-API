<?php

namespace Tournament\API\V1\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tournament\API\V1\Repositories\MatchRepository;
use Tournament\Http\Requests;
use Tournament\API\V1\Transformers\MatchesTransformer;

class MatchController extends APIController
{
    private $matchRepository;

    public function __construct(MatchRepository $matchRepository)
    {
        $this->matchRepository = $matchRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->matchRepository
            ->findAll();

        foreach ($data as $match) {
//            $match->getHomeTeam()->getPlayers()->getUser();
//            $match->getAwayTeam()->getPlayers()->getUser();

//            $match->homeTeam->players->load('user');
//            $match->awayTeam->players->load('user');
        }

        return $this->apiResponseSucces($data, new MatchesTransformer());
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
        //
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
