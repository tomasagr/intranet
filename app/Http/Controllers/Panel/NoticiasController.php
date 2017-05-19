<?php

namespace Intranet\Http\Controllers\Panel;

use Intranet\Http\Requests\Panel\CreateNoticiasRequest;
use Intranet\Http\Requests\Panel\UpdateNoticiasRequest;
use Intranet\Repositories\Panel\NoticiasRepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NoticiasController extends AppBaseController
{
    /** @var  NoticiasRepository */
    private $noticiasRepository;

    public function __construct(NoticiasRepository $noticiasRepo)
    {
        $this->noticiasRepository = $noticiasRepo;
    }

    /**
     * Display a listing of the Noticias.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->noticiasRepository->pushCriteria(new RequestCriteria($request));
        $noticias = $this->noticiasRepository->all();

        return view('panel.noticias.index')
            ->with('noticias', $noticias);
    }

    /**
     * Show the form for creating a new Noticias.
     *
     * @return Response
     */
    public function create()
    {
        return view('panel.noticias.create');
    }

    /**
     * Store a newly created Noticias in storage.
     *
     * @param CreateNoticiasRequest $request
     *
     * @return Response
     */
    public function store(CreateNoticiasRequest $request)
    {
        $input = $request->all();
        if (!$request->file('image')) {
            Flash::error('Imagen requerida.');
            return redirect()->back()->withInput();
        } else {
            $input['image'] = $request->file('image')->store('noticias', 'public');
        }

        $noticias = $this->noticiasRepository->create($input);

        Flash::success('Noticias creado con exito.');

        return redirect(route('panel.noticias.index'));
    }

    /**
     * Display the specified Noticias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $noticias = $this->noticiasRepository->findWithoutFail($id);

        if (empty($noticias)) {
            Flash::error('Noticias no encontrado.');

            return redirect(route('panel.noticias.index'));
        }

        return view('panel.noticias.show')->with('noticias', $noticias);
    }

    /**
     * Show the form for editing the specified Noticias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $noticias = $this->noticiasRepository->findWithoutFail($id);

        if (empty($noticias)) {
            Flash::error('Noticias no encontrado.');

            return redirect(route('panel.noticias.index'));
        }

        return view('panel.noticias.edit')->with('noticias', $noticias);
    }

    /**
     * Update the specified Noticias in storage.
     *
     * @param  int              $id
     * @param UpdateNoticiasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNoticiasRequest $request)
    {
        $noticias = $this->noticiasRepository->findWithoutFail($id);
        $input = $request->all();

        if (empty($noticias)) {
            Flash::error('Noticias no encontrado.');

            return redirect(route('panel.noticias.index'));
        }

        if ($request->file('image')) {
            $input['image'] = $request->file('image')->store('noticias', 'public');
        }

        $noticias = $this->noticiasRepository->update($input, $id);

        Flash::success('Noticias actualizado con exito.');

        return redirect(route('panel.noticias.index'));
    }

    /**
     * Remove the specified Noticias from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $noticias = $this->noticiasRepository->findWithoutFail($id);

        if (empty($noticias)) {
            Flash::error('Noticias no encontrado.');

            return redirect(route('panel.noticias.index'));
        }

        $this->noticiasRepository->delete($id);

        Flash::success('Noticias eliminado con exito.');

        return redirect(route('panel.noticias.index'));
    }
}
