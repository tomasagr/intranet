<?php

namespace Intranet\Http\Controllers\API;

use Intranet\Http\Requests\API\CreateForoAPIRequest;
use Intranet\Http\Requests\API\UpdateForoAPIRequest;
use Intranet\Models\Foro;
use App\Repositories\ForoRepository;
use Illuminate\Http\Request;
use Intranet\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ForoController
 * @package App\Http\Controllers\API
 */

class ForoAPIController extends AppBaseController
{
    /** @var  ForoRepository */
    private $foroRepository;

    public function __construct(ForoRepository $foroRepo)
    {
        $this->foroRepository = $foroRepo;
    }

    /**
     * Display a listing of the Foro.
     * GET|HEAD /foros
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->foroRepository->pushCriteria(new RequestCriteria($request));
        $this->foroRepository->pushCriteria(new LimitOffsetCriteria($request));
        $foros = $this->foroRepository->all();

        return $this->sendResponse($foros->toArray(), 'Foros retrieved successfully');
    }

    /**
     * Store a newly created Foro in storage.
     * POST /foros
     *
     * @param CreateForoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateForoAPIRequest $request)
    {
        $input = $request->all();

        $foros = $this->foroRepository->create($input);

        return $this->sendResponse($foros->toArray(), 'Foro saved successfully');
    }

    /**
     * Display the specified Foro.
     * GET|HEAD /foros/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Foro $foro */
        $foro = $this->foroRepository->findWithoutFail($id);

        if (empty($foro)) {
            return $this->sendError('Foro not found');
        }

        return $this->sendResponse($foro->toArray(), 'Foro retrieved successfully');
    }

    /**
     * Update the specified Foro in storage.
     * PUT/PATCH /foros/{id}
     *
     * @param  int $id
     * @param UpdateForoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateForoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Foro $foro */
        $foro = $this->foroRepository->findWithoutFail($id);

        if (empty($foro)) {
            return $this->sendError('Foro not found');
        }

        $foro = $this->foroRepository->update($input, $id);

        return $this->sendResponse($foro->toArray(), 'Foro updated successfully');
    }

    /**
     * Remove the specified Foro from storage.
     * DELETE /foros/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Foro $foro */
        $foro = $this->foroRepository->findWithoutFail($id);

        if (empty($foro)) {
            return $this->sendError('Foro not found');
        }

        $foro->delete();

        return $this->sendResponse($id, 'Foro deleted successfully');
    }
}
