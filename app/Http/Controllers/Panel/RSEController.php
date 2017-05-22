<?php

namespace Intranet\Http\Controllers\Panel;

use Intranet\Http\Requests\Panel\CreateRSERequest;
use Intranet\Http\Requests\Panel\UpdateRSERequest;
use Intranet\Repositories\Panel\RSERepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RSEController extends AppBaseController
{
    /** @var  RSERepository */
    private $rSERepository;

    public function __construct(RSERepository $rSERepo)
    {
        $this->rSERepository = $rSERepo;
    }

    /**
     * Display a listing of the RSE.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rSERepository->pushCriteria(new RequestCriteria($request));
        $rSES = $this->rSERepository->all();

        return view('panel.r_s_e_s.index')
            ->with('rSES', $rSES);
    }

    /**
     * Show the form for creating a new RSE.
     *
     * @return Response
     */
    public function create()
    {
        return view('panel.r_s_e_s.create');
    }

    /**
     * Store a newly created RSE in storage.
     *
     * @param CreateRSERequest $request
     *
     * @return Response
     */
    public function store(CreateRSERequest $request)
    {
        $input = $request->all();

        $rSE = $this->rSERepository->create($input);

        Flash::success('RSE creado con exito.');

        return redirect(route('panel.rSES.index'));
    }

    /**
     * Display the specified RSE.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rSE = $this->rSERepository->findWithoutFail($id);

        if (empty($rSE)) {
            Flash::error('RSE no encontrado.');

            return redirect(route('panel.rSES.index'));
        }

        return view('panel.r_s_e_s.show')->with('rSE', $rSE);
    }

    /**
     * Show the form for editing the specified RSE.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rSE = $this->rSERepository->findWithoutFail($id);

        if (empty($rSE)) {
            Flash::error('RSE no encontrado.');

            return redirect(route('panel.rSES.index'));
        }

        return view('panel.r_s_e_s.edit')->with('rSE', $rSE);
    }

    /**
     * Update the specified RSE in storage.
     *
     * @param  int              $id
     * @param UpdateRSERequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRSERequest $request)
    {
        $rSE = $this->rSERepository->findWithoutFail($id);

        if (empty($rSE)) {
            Flash::error('RSE no encontrado.');

            return redirect(route('panel.rSES.index'));
        }

        $rSE = $this->rSERepository->update($request->all(), $id);

        Flash::success('RSE actualizado con exito.');

        return redirect(route('panel.rSES.index'));
    }

    /**
     * Remove the specified RSE from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rSE = $this->rSERepository->findWithoutFail($id);

        if (empty($rSE)) {
            Flash::error('RSE no encontrado.');

            return redirect(route('panel.rSES.index'));
        }

        $this->rSERepository->delete($id);

        Flash::success('RSE eliminado con exito.');

        return redirect(route('panel.rSES.index'));
    }

    public function apply($id) 
    {
        $rSE = \Intranet\Models\Panel\RSE::with('users')->find($id);
        return view('panel.r_s_e_s.apply', compact('rSE'));
    }    
}
