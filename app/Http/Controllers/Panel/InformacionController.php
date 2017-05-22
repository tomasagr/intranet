<?php

namespace Intranet\Http\Controllers\Panel;

use Intranet\Http\Requests\Panel\CreateInformacionRequest;
use Intranet\Http\Requests\Panel\UpdateInformacionRequest;
use Intranet\Repositories\Panel\InformacionRepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Intranet\Models\Panel\Informacion;

class InformacionController extends AppBaseController
{
    /** @var  InformacionRepository */
    private $informacionRepository;

    public function __construct(InformacionRepository $informacionRepo)
    {
        $this->informacionRepository = $informacionRepo;
    }

    /**
     * Display a listing of the Informacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->informacionRepository->pushCriteria(new RequestCriteria($request));
        $informacions = $this->informacionRepository->all();

        return view('panel.informacions.index')
            ->with('informacions', $informacions);
    }

    public function getAll() 
    {
        return Informacion::orderBy('created_at', 'desc')
                           ->limit(3)
                           ->get();
    }

    /**
     * Show the form for creating a new Informacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('panel.informacions.create');
    }

    /**
     * Store a newly created Informacion in storage.
     *
     * @param CreateInformacionRequest $request
     *
     * @return Response
     */
    public function store(CreateInformacionRequest $request)
    {
        $input = $request->all();

        if ($request->file('imagen')) {
            $input['imagen'] = $request->file('imagen')->store('noticias', 'public');
        }

        $informacion = $this->informacionRepository->create($input);

        Flash::success('Informacion creado con exito.');

        return redirect(route('panel.informacions.index'));
    }

    /**
     * Display the specified Informacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $informacion = $this->informacionRepository->findWithoutFail($id);

        if (empty($informacion)) {
            Flash::error('Informacion no encontrado.');

            return redirect(route('panel.informacions.index'));
        }

        return view('panel.informacions.show')->with('informacion', $informacion);
    }

    /**
     * Show the form for editing the specified Informacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $informacion = $this->informacionRepository->findWithoutFail($id);

        if (empty($informacion)) {
            Flash::error('Informacion no encontrado.');

            return redirect(route('panel.informacions.index'));
        }

        return view('panel.informacions.edit')->with('informacion', $informacion);
    }

    /**
     * Update the specified Informacion in storage.
     *
     * @param  int              $id
     * @param UpdateInformacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformacionRequest $request)
    {
        $informacion = $this->informacionRepository->findWithoutFail($id);
        $input = $request->all();

        if (empty($informacion)) {
            Flash::error('Informacion no encontrado.');

            return redirect(route('panel.informacions.index'));
        }

        if ($request->file('imagen')) {
            $input['imagen'] = $request->file('imagen')->store('noticias', 'public');
        }

        $informacion = $this->informacionRepository->update($input, $id);

        Flash::success('Informacion actualizado con exito.');

        return redirect(route('panel.informacions.index'));
    }

    /**
     * Remove the specified Informacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $informacion = $this->informacionRepository->findWithoutFail($id);

        if (empty($informacion)) {
            Flash::error('Informacion no encontrado.');

            return redirect(route('panel.informacions.index'));
        }

        $this->informacionRepository->delete($id);

        Flash::success('Informacion eliminado con exito.');

        return redirect(route('panel.informacions.index'));
    }
}
