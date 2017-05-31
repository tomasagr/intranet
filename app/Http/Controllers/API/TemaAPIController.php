<?php

namespace Intranet\Http\Controllers\API;

use Intranet\Http\Requests\API\CreateTemaAPIRequest;
use Intranet\Http\Requests\API\UpdateTemaAPIRequest;
use Intranet\Models\Tema;
use App\Repositories\TemaRepository;
use Illuminate\Http\Request;
use Intranet\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TemaController
 * @package App\Http\Controllers\API
 */

class TemaAPIController extends AppBaseController
{
    /** @var  TemaRepository */
    private $temaRepository;

    public function __construct(TemaRepository $temaRepo)
    {
        $this->temaRepository = $temaRepo;
    }

    /**
     * Display a listing of the Tema.
     * GET|HEAD /temas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->temaRepository->pushCriteria(new RequestCriteria($request));
        $this->temaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $temas = $this->temaRepository->all();

        return $this->sendResponse($temas->toArray(), 'Temas retrieved successfully');
    }

    /**
     * Store a newly created Tema in storage.
     * POST /temas
     *
     * @param CreateTemaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTemaAPIRequest $request)
    {
        $input = $request->all();

        $temas = $this->temaRepository->create($input);

        return $this->sendResponse($temas->toArray(), 'Tema saved successfully');
    }

    /**
     * Display the specified Tema.
     * GET|HEAD /temas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tema $tema */
        $tema = $this->temaRepository->findWithoutFail($id);

        if (empty($tema)) {
            return $this->sendError('Tema not found');
        }

        return $this->sendResponse($tema->toArray(), 'Tema retrieved successfully');
    }

    /**
     * Update the specified Tema in storage.
     * PUT/PATCH /temas/{id}
     *
     * @param  int $id
     * @param UpdateTemaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTemaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tema $tema */
        $tema = $this->temaRepository->findWithoutFail($id);

        if (empty($tema)) {
            return $this->sendError('Tema not found');
        }

        $tema = $this->temaRepository->update($input, $id);

        return $this->sendResponse($tema->toArray(), 'Tema updated successfully');
    }

    /**
     * Remove the specified Tema from storage.
     * DELETE /temas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tema $tema */
        $tema = $this->temaRepository->findWithoutFail($id);

        if (empty($tema)) {
            return $this->sendError('Tema not found');
        }

        $tema->delete();

        return $this->sendResponse($id, 'Tema deleted successfully');
    }
}
