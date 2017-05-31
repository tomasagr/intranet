<?php

namespace Intranet\Http\Controllers\API;

use Intranet\Http\Requests\API\CreateComentarioAPIRequest;
use Intranet\Http\Requests\API\UpdateComentarioAPIRequest;
use Intranet\Models\Comentario;
use Intranet\Repositories\ComentarioRepository;
use Illuminate\Http\Request;
use Intranet\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ComentarioController
 * @package App\Http\Controllers\API
 */

class ComentarioAPIController extends AppBaseController
{
    /** @var  ComentarioRepository */
    private $comentarioRepository;

    public function __construct(ComentarioRepository $comentarioRepo)
    {
        $this->comentarioRepository = $comentarioRepo;
    }

    /**
     * Display a listing of the Comentario.
     * GET|HEAD /comentarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->comentarioRepository->pushCriteria(new RequestCriteria($request));
        $this->comentarioRepository->pushCriteria(new LimitOffsetCriteria($request));
        $comentarios = $this->comentarioRepository->all();

        return $this->sendResponse($comentarios->toArray(), 'Comentarios retrieved successfully');
    }

    /**
     * Store a newly created Comentario in storage.
     * POST /comentarios
     *
     * @param CreateComentarioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateComentarioAPIRequest $request)
    {
        $input = $request->all();

        $comentarios = $this->comentarioRepository->create($input);

        return $this->sendResponse($comentarios->toArray(), 'Comentario saved successfully');
    }

    /**
     * Display the specified Comentario.
     * GET|HEAD /comentarios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Comentario $comentario */
        $comentario = $this->comentarioRepository->findWithoutFail($id);

        if (empty($comentario)) {
            return $this->sendError('Comentario not found');
        }

        return $this->sendResponse($comentario->toArray(), 'Comentario retrieved successfully');
    }

    /**
     * Update the specified Comentario in storage.
     * PUT/PATCH /comentarios/{id}
     *
     * @param  int $id
     * @param UpdateComentarioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComentarioAPIRequest $request)
    {
        $input = $request->all();

        /** @var Comentario $comentario */
        $comentario = $this->comentarioRepository->findWithoutFail($id);

        if (empty($comentario)) {
            return $this->sendError('Comentario not found');
        }

        $comentario = $this->comentarioRepository->update($input, $id);

        return $this->sendResponse($comentario->toArray(), 'Comentario updated successfully');
    }

    /**
     * Remove the specified Comentario from storage.
     * DELETE /comentarios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Comentario $comentario */
        $comentario = $this->comentarioRepository->findWithoutFail($id);

        if (empty($comentario)) {
            return $this->sendError('Comentario not found');
        }

        $comentario->delete();

        return $this->sendResponse($id, 'Comentario deleted successfully');
    }
}
