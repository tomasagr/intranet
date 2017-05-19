<?php

namespace Intranet\Http\Controllers\Panel;

use Intranet\Http\Requests\Panel\CreateVacacionesRequest;
use Intranet\Http\Requests\Panel\UpdateVacacionesRequest;
use Intranet\Repositories\Panel\VacacionesRepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VacacionesController extends AppBaseController
{
    /** @var  VacacionesRepository */
    private $vacacionesRepository;

    public function __construct(VacacionesRepository $vacacionesRepo)
    {
        $this->vacacionesRepository = $vacacionesRepo;
    }

    /**
     * Display a listing of the Vacaciones.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vacacionesRepository->pushCriteria(new RequestCriteria($request));
        $vacaciones = $this->vacacionesRepository->all();

        return view('panel.vacaciones.index')
            ->with('vacaciones', $vacaciones);
    }

    /**
     * Show the form for creating a new Vacaciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('panel.vacaciones.create');
    }

    /**
     * Store a newly created Vacaciones in storage.
     *
     * @param CreateVacacionesRequest $request
     *
     * @return Response
     */
    public function store(CreateVacacionesRequest $request)
    {
        $input = $request->all();

        $vacaciones = $this->vacacionesRepository->create($input);

        Flash::success('Vacaciones creado con exito.');

        return redirect(route('panel.vacaciones.index'));
    }

    /**
     * Display the specified Vacaciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vacaciones = $this->vacacionesRepository->findWithoutFail($id);

        if (empty($vacaciones)) {
            Flash::error('Vacaciones no encontrado.');

            return redirect(route('panel.vacaciones.index'));
        }

        return view('panel.vacaciones.show')->with('vacaciones', $vacaciones);
    }

    /**
     * Show the form for editing the specified Vacaciones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vacaciones = $this->vacacionesRepository->findWithoutFail($id);

        if (empty($vacaciones)) {
            Flash::error('Vacaciones no encontrado.');

            return redirect(route('panel.vacaciones.index'));
        }

        return view('panel.vacaciones.edit')->with('vacaciones', $vacaciones);
    }

    /**
     * Update the specified Vacaciones in storage.
     *
     * @param  int              $id
     * @param UpdateVacacionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVacacionesRequest $request)
    {
        $vacaciones = $this->vacacionesRepository->findWithoutFail($id);

        if (empty($vacaciones)) {
            Flash::error('Vacaciones no encontrado.');

            return redirect(route('panel.vacaciones.index'));
        }

        $vacaciones = $this->vacacionesRepository->update($request->all(), $id);

        Flash::success('Vacaciones actualizado con exito.');

        return redirect(route('panel.vacaciones.index'));
    }

    /**
     * Remove the specified Vacaciones from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vacaciones = $this->vacacionesRepository->findWithoutFail($id);

        if (empty($vacaciones)) {
            Flash::error('Vacaciones no encontrado.');

            return redirect(route('panel.vacaciones.index'));
        }

        $this->vacacionesRepository->delete($id);

        Flash::success('Vacaciones eliminado con exito.');

        return redirect(route('panel.vacaciones.index'));
    }
}
