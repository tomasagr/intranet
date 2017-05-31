<?php

namespace Intranet\Http\Controllers;

use Intranet\Http\Requests\CreateForoRequest;
use Intranet\Http\Requests\UpdateForoRequest;
use Intranet\Repositories\ForoRepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ForoController extends AppBaseController
{
    /** @var  ForoRepository */
    private $foroRepository;

    public function __construct(ForoRepository $foroRepo)
    {
        $this->foroRepository = $foroRepo;
    }

    /**
     * Display a listing of the Foro.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->foroRepository->pushCriteria(new RequestCriteria($request));
        $foros = $this->foroRepository->all();

        return view('foros.index')
            ->with('foros', $foros);
    }

    /**
     * Show the form for creating a new Foro.
     *
     * @return Response
     */
    public function create()
    {
        return view('foros.create');
    }

    /**
     * Store a newly created Foro in storage.
     *
     * @param CreateForoRequest $request
     *
     * @return Response
     */
    public function store(CreateForoRequest $request)
    {
        $input = $request->all();

        $foro = $this->foroRepository->create($input);

        Flash::success('Foro creado con exito.');

        return redirect(route('foros.index'));
    }

    /**
     * Display the specified Foro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $foro = $this->foroRepository->findWithoutFail($id);

        if (empty($foro)) {
            Flash::error('Foro no encontrado.');

            return redirect(route('foros.index'));
        }

        return view('foros.show')->with('foro', $foro);
    }

    /**
     * Show the form for editing the specified Foro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $foro = $this->foroRepository->findWithoutFail($id);

        if (empty($foro)) {
            Flash::error('Foro no encontrado.');

            return redirect(route('foros.index'));
        }

        return view('foros.edit')->with('foro', $foro);
    }

    /**
     * Update the specified Foro in storage.
     *
     * @param  int              $id
     * @param UpdateForoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateForoRequest $request)
    {
        $foro = $this->foroRepository->findWithoutFail($id);

        if (empty($foro)) {
            Flash::error('Foro no encontrado.');

            return redirect(route('foros.index'));
        }

        $foro = $this->foroRepository->update($request->all(), $id);

        Flash::success('Foro actualizado con exito.');

        return redirect(route('foros.index'));
    }

    /**
     * Remove the specified Foro from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $foro = $this->foroRepository->findWithoutFail($id);

        if (empty($foro)) {
            Flash::error('Foro no encontrado.');

            return redirect(route('foros.index'));
        }

        $this->foroRepository->delete($id);

        Flash::success('Foro eliminado con exito.');

        return redirect(route('foros.index'));
    }
}
