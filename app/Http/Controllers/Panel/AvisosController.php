<?php

namespace Intranet\Http\Controllers\Panel;

use Intranet\Http\Requests\Panel\CreateAvisosRequest;
use Intranet\Http\Requests\Panel\UpdateAvisosRequest;
use Intranet\Repositories\Panel\AvisosRepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AvisosController extends AppBaseController
{
    /** @var  AvisosRepository */
    private $avisosRepository;

    public function __construct(AvisosRepository $avisosRepo)
    {
        $this->avisosRepository = $avisosRepo;
    }

    /**
     * Display a listing of the Avisos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->avisosRepository->pushCriteria(new RequestCriteria($request));
        $avisos = $this->avisosRepository->all();

        return view('panel.avisos.index')
            ->with('avisos', $avisos);
    }

    /**
     * Show the form for creating a new Avisos.
     *
     * @return Response
     */
    public function create()
    {
        return view('panel.avisos.create');
    }

    /**
     * Store a newly created Avisos in storage.
     *
     * @param CreateAvisosRequest $request
     *
     * @return Response
     */
    public function store(CreateAvisosRequest $request)
    {
        $input = $request->all();

        $avisos = $this->avisosRepository->create($input);

        Flash::success('Avisos creado con exito.');

        return redirect(route('panel.avisos.index'));
    }

    /**
     * Display the specified Avisos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $avisos = $this->avisosRepository->findWithoutFail($id);

        if (empty($avisos)) {
            Flash::error('Avisos no encontrado.');

            return redirect(route('panel.avisos.index'));
        }

        return view('panel.avisos.show')->with('avisos', $avisos);
    }

    /**
     * Show the form for editing the specified Avisos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $avisos = $this->avisosRepository->findWithoutFail($id);

        if (empty($avisos)) {
            Flash::error('Avisos no encontrado.');

            return redirect(route('panel.avisos.index'));
        }

        return view('panel.avisos.edit')->with('avisos', $avisos);
    }

    /**
     * Update the specified Avisos in storage.
     *
     * @param  int              $id
     * @param UpdateAvisosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAvisosRequest $request)
    {
        $avisos = $this->avisosRepository->findWithoutFail($id);

        if (empty($avisos)) {
            Flash::error('Avisos no encontrado.');

            return redirect(route('panel.avisos.index'));
        }

        $avisos = $this->avisosRepository->update($request->all(), $id);

        Flash::success('Avisos actualizado con exito.');

        return redirect(route('panel.avisos.index'));
    }

    /**
     * Remove the specified Avisos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $avisos = $this->avisosRepository->findWithoutFail($id);

        if (empty($avisos)) {
            Flash::error('Avisos no encontrado.');

            return redirect(route('panel.avisos.index'));
        }

        $this->avisosRepository->delete($id);

        Flash::success('Avisos eliminado con exito.');

        return redirect(route('panel.avisos.index'));
    }
}
