<?php

namespace Intranet\Http\Controllers\Panel;

use Intranet\Http\Requests\Panel\CreateManualesRequest;
use Intranet\Http\Requests\Panel\UpdateManualesRequest;
use Intranet\Repositories\Panel\ManualesRepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ManualesController extends AppBaseController
{
    /** @var  ManualesRepository */
    private $manualesRepository;

    public function __construct(ManualesRepository $manualesRepo)
    {
        $this->manualesRepository = $manualesRepo;
    }

    /**
     * Display a listing of the Manuales.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->manualesRepository->pushCriteria(new RequestCriteria($request));
        $manuales = $this->manualesRepository->all();

        return view('panel.manuales.index')
            ->with('manuales', $manuales);
    }

    /**
     * Show the form for creating a new Manuales.
     *
     * @return Response
     */
    public function create()
    {
        return view('panel.manuales.create');
    }

    /**
     * Store a newly created Manuales in storage.
     *
     * @param CreateManualesRequest $request
     *
     * @return Response
     */
    public function store(CreateManualesRequest $request)
    {
        $input = $request->all();

        if ($request->file('file')) {
            $input['file'] = $request->file('file')->store('manual', 'public');
        }

        $manuales = $this->manualesRepository->create($input);

        Flash::success('Manuales creado con exito.');

        return redirect(route('panel.manuales.index'));
    }

    /**
     * Display the specified Manuales.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $manuales = $this->manualesRepository->findWithoutFail($id);

        if ($request->file('file')) {
            $input['file'] = $request->file('file')->store('noticias', 'public');
        }

        if (empty($manuales)) {
            Flash::error('Manuales no encontrado.');

            return redirect(route('panel.manuales.index'));
        }

        return view('panel.manuales.show')->with('manuales', $manuales);
    }

    /**
     * Show the form for editing the specified Manuales.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $manuales = $this->manualesRepository->findWithoutFail($id);

        if (empty($manuales)) {
            Flash::error('Manuales no encontrado.');

            return redirect(route('panel.manuales.index'));
        }

        return view('panel.manuales.edit')->with('manuales', $manuales);
    }

    /**
     * Update the specified Manuales in storage.
     *
     * @param  int              $id
     * @param UpdateManualesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateManualesRequest $request)
    {
        $manuales = $this->manualesRepository->findWithoutFail($id);

        if (empty($manuales)) {
            Flash::error('Manuales no encontrado.');

            return redirect(route('panel.manuales.index'));
        }

        $manuales = $this->manualesRepository->update($request->all(), $id);

        Flash::success('Manuales actualizado con exito.');

        return redirect(route('panel.manuales.index'));
    }

    /**
     * Remove the specified Manuales from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $manuales = $this->manualesRepository->findWithoutFail($id);

        if (empty($manuales)) {
            Flash::error('Manuales no encontrado.');

            return redirect(route('panel.manuales.index'));
        }

        $this->manualesRepository->delete($id);

        Flash::success('Manuales eliminado con exito.');

        return redirect(route('panel.manuales.index'));
    }
}
