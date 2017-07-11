<?php

namespace Intranet\Http\Controllers;

use Intranet\Http\Requests\CreateSectoresRequest;
use Intranet\Http\Requests\UpdateSectoresRequest;
use Intranet\Repositories\SectoresRepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SectoresController extends AppBaseController
{
    /** @var  SectoresRepository */
    private $sectoresRepository;

    public function __construct(SectoresRepository $sectoresRepo)
    {
        $this->sectoresRepository = $sectoresRepo;
    }

    /**
     * Display a listing of the Sectores.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sectoresRepository->pushCriteria(new RequestCriteria($request));
        $sectores = $this->sectoresRepository->all();

        return view('sectores.index')
            ->with('sectores', $sectores);
    }

    /**
     * Show the form for creating a new Sectores.
     *
     * @return Response
     */
    public function create()
    {
        return view('sectores.create');
    }

    /**
     * Store a newly created Sectores in storage.
     *
     * @param CreateSectoresRequest $request
     *
     * @return Response
     */
    public function store(CreateSectoresRequest $request)
    {
        $input = $request->all();

        $sectores = $this->sectoresRepository->create($input);

        Flash::success('Sectores creado con exito.');

        return redirect(route('sectores.index'));
    }

    /**
     * Display the specified Sectores.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sectores = $this->sectoresRepository->findWithoutFail($id);

        if (empty($sectores)) {
            Flash::error('Sectores no encontrado.');

            return redirect(route('sectores.index'));
        }

        return view('sectores.show')->with('sectores', $sectores);
    }

    /**
     * Show the form for editing the specified Sectores.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sectores = $this->sectoresRepository->findWithoutFail($id);

        if (empty($sectores)) {
            Flash::error('Sectores no encontrado.');

            return redirect(route('sectores.index'));
        }

        return view('sectores.edit')->with('sectores', $sectores);
    }

    /**
     * Update the specified Sectores in storage.
     *
     * @param  int              $id
     * @param UpdateSectoresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSectoresRequest $request)
    {
        $sectores = $this->sectoresRepository->findWithoutFail($id);

        if (empty($sectores)) {
            Flash::error('Sectores no encontrado.');

            return redirect(route('sectores.index'));
        }

        $sectores = $this->sectoresRepository->update($request->all(), $id);

        Flash::success('Sectores actualizado con exito.');

        return redirect(route('sectores.index'));
    }

    /**
     * Remove the specified Sectores from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sectores = $this->sectoresRepository->findWithoutFail($id);

        if (empty($sectores)) {
            Flash::error('Sectores no encontrado.');

            return redirect(route('sectores.index'));
        }

        $this->sectoresRepository->delete($id);

        Flash::success('Sectores eliminado con exito.');

        return redirect(route('sectores.index'));
    }
}
