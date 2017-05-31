<?php

namespace Intranet\Http\Controllers\API;

use Intranet\Http\Requests\API\CreateUsuarioTemaAPIRequest;
use Intranet\Http\Requests\API\UpdateUsuarioTemaAPIRequest;
use Intranet\Models\UsuarioTema;
use Intranet\Repositories\UsuarioTemaRepository;
use Illuminate\Http\Request;
use Intranet\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UsuarioTemaController
 * @package App\Http\Controllers\API
 */

class UsuarioTemaAPIController extends AppBaseController
{
    /** @var  UsuarioTemaRepository */
    private $usuarioTemaRepository;

    public function __construct(UsuarioTemaRepository $usuarioTemaRepo)
    {
        $this->usuarioTemaRepository = $usuarioTemaRepo;
    }

    /**
     * Display a listing of the UsuarioTema.
     * GET|HEAD /usuarioTemas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->usuarioTemaRepository->pushCriteria(new RequestCriteria($request));
        $this->usuarioTemaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $usuarioTemas = $this->usuarioTemaRepository->all();

        return $this->sendResponse($usuarioTemas->toArray(), 'Usuario Temas retrieved successfully');
    }

    /**
     * Store a newly created UsuarioTema in storage.
     * POST /usuarioTemas
     *
     * @param CreateUsuarioTemaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUsuarioTemaAPIRequest $request)
    {
        $input = $request->all();

        $usuarioTemas = $this->usuarioTemaRepository->create($input);

        return $this->sendResponse($usuarioTemas->toArray(), 'Usuario Tema saved successfully');
    }

    /**
     * Display the specified UsuarioTema.
     * GET|HEAD /usuarioTemas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UsuarioTema $usuarioTema */
        $usuarioTema = $this->usuarioTemaRepository->findWithoutFail($id);

        if (empty($usuarioTema)) {
            return $this->sendError('Usuario Tema not found');
        }

        return $this->sendResponse($usuarioTema->toArray(), 'Usuario Tema retrieved successfully');
    }

    /**
     * Update the specified UsuarioTema in storage.
     * PUT/PATCH /usuarioTemas/{id}
     *
     * @param  int $id
     * @param UpdateUsuarioTemaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsuarioTemaAPIRequest $request)
    {
        $input = $request->all();

        /** @var UsuarioTema $usuarioTema */
        $usuarioTema = $this->usuarioTemaRepository->findWithoutFail($id);

        if (empty($usuarioTema)) {
            return $this->sendError('Usuario Tema not found');
        }

        $usuarioTema = $this->usuarioTemaRepository->update($input, $id);

        return $this->sendResponse($usuarioTema->toArray(), 'UsuarioTema updated successfully');
    }

    /**
     * Remove the specified UsuarioTema from storage.
     * DELETE /usuarioTemas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UsuarioTema $usuarioTema */
        $usuarioTema = $this->usuarioTemaRepository->findWithoutFail($id);

        if (empty($usuarioTema)) {
            return $this->sendError('Usuario Tema not found');
        }

        $usuarioTema->delete();

        return $this->sendResponse($id, 'Usuario Tema deleted successfully');
    }
}
