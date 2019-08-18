<?php

namespace Tournament\API\V1\Controllers;
//use Stage\Entities\Repositories\Stage\StageRepository;


use Doctrine\ORM\EntityManager;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tournament\Api\V1\InverseTransformers\StageITransformer;
use Tournament\API\V1\Repositories\StageRepository;
use Tournament\API\V1\Transformers\StageTransformer;

class StageController extends APIController
{
    private $stageRepository;
    private $em;

    public function __construct(StageRepository $stageRepository, EntityManager $em)
    {
        $this->stageRepository = $stageRepository;
        $this->em = $em;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
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
            $stage = StageITransformer::newInstance($this->em)
                ->transform($request->all());

            $this->em->persist($stage);
            $this->em->flush();
            return $this->apiResponseSucces($stage, new StageTransformer());
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
        $stage = $this->em->getRepository(\Stage\Entities\Stage::class)->find($id);
        return $this->apiResponseSucces($stage, new StageTransformer());
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
