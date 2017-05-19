<?php

namespace Intranet\Http\Controllers\Panel;

use Intranet\Http\Requests\Panel\CreateContenidoRequest;
use Intranet\Http\Requests\Panel\UpdateContenidoRequest;
use Intranet\Repositories\Panel\ContenidoRepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ContenidoController extends AppBaseController
{
    /** @var  ContenidoRepository */
    private $contenidoRepository;

    public function __construct(ContenidoRepository $contenidoRepo)
    {
        $this->contenidoRepository = $contenidoRepo;
    }

    /**
     * Display a listing of the Contenido.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contenidoRepository->pushCriteria(new RequestCriteria($request));
        $contenidos = $this->contenidoRepository->all();

        return view('panel.contenidos.index')
            ->with('contenidos', $contenidos);
    }

    /**
     * Show the form for creating a new Contenido.
     *
     * @return Response
     */
    public function create()
    {
        return view('panel.contenidos.create');
    }

    /**
     * Store a newly created Contenido in storage.
     *
     * @param CreateContenidoRequest $request
     *
     * @return Response
     */
    public function store(CreateContenidoRequest $request)
    {
        $input = $request->all();

        if (!$request->file('image')) {
            Flash::error('Imagen requerida.');
            return redirect()->back()->withInput();
        } else {
            $input['image'] = $request->file('image')->store('contenido', 'public');
        }

        $contenido = $this->contenidoRepository->create($input);

        Flash::success('Contenido creado con exito.');

        return redirect(route('panel.contenidos.index'));
    }

    /**
     * Display the specified Contenido.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contenido = $this->contenidoRepository->findWithoutFail($id);

        if (empty($contenido)) {
            Flash::error('Contenido no encontrado.');

            return redirect(route('panel.contenidos.index'));
        }

        return view('panel.contenidos.show')->with('contenido', $contenido);
    }

    /**
     * Show the form for editing the specified Contenido.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contenido = $this->contenidoRepository->findWithoutFail($id);

        if (empty($contenido)) {
            Flash::error('Contenido no encontrado.');

            return redirect(route('panel.contenidos.index'));
        }

        return view('panel.contenidos.edit')->with('contenido', $contenido);
    }

    /**
     * Update the specified Contenido in storage.
     *
     * @param  int              $id
     * @param UpdateContenidoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContenidoRequest $request)
    {
        $contenido = $this->contenidoRepository->findWithoutFail($id);
        $input = $request->all();

        if (empty($contenido)) {
            Flash::error('Contenido no encontrado.');

            return redirect(route('panel.contenidos.index'));
        }

        if ($request->file('image')) {
            $input['image'] = $request->file('image')->store('contenido', 'public');
        }

        $contenido = $this->contenidoRepository->update($input, $id);

        Flash::success('Contenido actualizado con exito.');

        return redirect(route('panel.contenidos.index'));
    }

    /**
     * Remove the specified Contenido from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contenido = $this->contenidoRepository->findWithoutFail($id);

        if (empty($contenido)) {
            Flash::error('Contenido no encontrado.');

            return redirect(route('panel.contenidos.index'));
        }

        $this->contenidoRepository->delete($id);

        Flash::success('Contenido eliminado con exito.');

        return redirect(route('panel.contenidos.index'));
    }
}
