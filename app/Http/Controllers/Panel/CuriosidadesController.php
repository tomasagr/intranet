<?php

namespace Intranet\Http\Controllers\Panel;

use Intranet\Http\Requests\Panel\CreateCuriosidadesRequest;
use Intranet\Http\Requests\Panel\UpdateCuriosidadesRequest;
use Intranet\Repositories\Panel\CuriosidadesRepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Intranet\Models\Panel\Curiosidades;

class CuriosidadesController extends AppBaseController
{
    /** @var  CuriosidadesRepository */
    private $curiosidadesRepository;

    public function __construct(CuriosidadesRepository $curiosidadesRepo)
    {
        $this->curiosidadesRepository = $curiosidadesRepo;
    }

    public function getAll() 
    {
        return Curiosidades::orderBy('created_at', 'desc')
                           ->limit(6)
                           ->get();
    }

    /**
     * Display a listing of the Curiosidades.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->curiosidadesRepository->pushCriteria(new RequestCriteria($request));
        $curiosidades = $this->curiosidadesRepository->all();

        return view('panel.curiosidades.index')
            ->with('curiosidades', $curiosidades);
    }

    /**
     * Show the form for creating a new Curiosidades.
     *
     * @return Response
     */
    public function create()
    {
        return view('panel.curiosidades.create');
    }

    /**
     * Store a newly created Curiosidades in storage.
     *
     * @param CreateCuriosidadesRequest $request
     *
     * @return Response
     */
    public function store(CreateCuriosidadesRequest $request)
    {
        $input = $request->all();

        $curiosidades = $this->curiosidadesRepository->create($input);

        Flash::success('Curiosidades creado con exito.');

        return redirect(route('panel.curiosidades.index'));
    }

    /**
     * Display the specified Curiosidades.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $curiosidades = $this->curiosidadesRepository->findWithoutFail($id);

        if (empty($curiosidades)) {
            Flash::error('Curiosidades no encontrado.');

            return redirect(route('panel.curiosidades.index'));
        }

        return view('panel.curiosidades.show')->with('curiosidades', $curiosidades);
    }

    /**
     * Show the form for editing the specified Curiosidades.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $curiosidades = $this->curiosidadesRepository->findWithoutFail($id);

        if (empty($curiosidades)) {
            Flash::error('Curiosidades no encontrado.');

            return redirect(route('panel.curiosidades.index'));
        }

        return view('panel.curiosidades.edit')->with('curiosidades', $curiosidades);
    }

    /**
     * Update the specified Curiosidades in storage.
     *
     * @param  int              $id
     * @param UpdateCuriosidadesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCuriosidadesRequest $request)
    {
        $curiosidades = $this->curiosidadesRepository->findWithoutFail($id);

        if (empty($curiosidades)) {
            Flash::error('Curiosidades no encontrado.');

            return redirect(route('panel.curiosidades.index'));
        }

        $curiosidades = $this->curiosidadesRepository->update($request->all(), $id);

        Flash::success('Curiosidades actualizado con exito.');

        return redirect(route('panel.curiosidades.index'));
    }

    /**
     * Remove the specified Curiosidades from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $curiosidades = $this->curiosidadesRepository->findWithoutFail($id);

        if (empty($curiosidades)) {
            Flash::error('Curiosidades no encontrado.');

            return redirect(route('panel.curiosidades.index'));
        }

        $this->curiosidadesRepository->delete($id);

        Flash::success('Curiosidades eliminado con exito.');

        return redirect(route('panel.curiosidades.index'));
    }
}
