<?php

namespace Intranet\Http\Controllers\Panel;

use Intranet\Http\Requests\Panel\CreateEventosRequest;
use Intranet\Http\Requests\Panel\UpdateEventosRequest;
use Intranet\Repositories\Panel\EventosRepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventosController extends AppBaseController
{
    /** @var  EventosRepository */
    private $eventosRepository;

    public function __construct(EventosRepository $eventosRepo)
    {
        $this->eventosRepository = $eventosRepo;
    }

    /**
     * Display a listing of the Eventos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventosRepository->pushCriteria(new RequestCriteria($request));
        $eventos = $this->eventosRepository->all();

        return view('panel.eventos.index')
            ->with('eventos', $eventos);
    }

    /**
     * Show the form for creating a new Eventos.
     *
     * @return Response
     */
    public function create()
    {
        return view('panel.eventos.create');
    }

    /**
     * Store a newly created Eventos in storage.
     *
     * @param CreateEventosRequest $request
     *
     * @return Response
     */
    public function store(CreateEventosRequest $request)
    {
        $input = $request->all();

        $eventos = $this->eventosRepository->create($input);

        Flash::success('Eventos creado con exito.');

        return redirect(route('panel.eventos.index'));
    }

    /**
     * Display the specified Eventos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventos = $this->eventosRepository->findWithoutFail($id);

        if (empty($eventos)) {
            Flash::error('Eventos no encontrado.');

            return redirect(route('panel.eventos.index'));
        }

        return view('panel.eventos.show')->with('eventos', $eventos);
    }

    /**
     * Show the form for editing the specified Eventos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventos = $this->eventosRepository->findWithoutFail($id);

        if (empty($eventos)) {
            Flash::error('Eventos no encontrado.');

            return redirect(route('panel.eventos.index'));
        }

        return view('panel.eventos.edit')->with('eventos', $eventos);
    }

    /**
     * Update the specified Eventos in storage.
     *
     * @param  int              $id
     * @param UpdateEventosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventosRequest $request)
    {
        $eventos = $this->eventosRepository->findWithoutFail($id);

        if (empty($eventos)) {
            Flash::error('Eventos no encontrado.');

            return redirect(route('panel.eventos.index'));
        }

        $eventos = $this->eventosRepository->update($request->all(), $id);

        Flash::success('Eventos actualizado con exito.');

        return redirect(route('panel.eventos.index'));
    }

    /**
     * Remove the specified Eventos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventos = $this->eventosRepository->findWithoutFail($id);

        if (empty($eventos)) {
            Flash::error('Eventos no encontrado.');

            return redirect(route('panel.eventos.index'));
        }

        $this->eventosRepository->delete($id);

        Flash::success('Eventos eliminado con exito.');

        return redirect(route('panel.eventos.index'));
    }
}
