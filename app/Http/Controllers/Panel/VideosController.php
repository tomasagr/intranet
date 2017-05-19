<?php

namespace Intranet\Http\Controllers\Panel;

use Intranet\Http\Requests\Panel\CreateVideosRequest;
use Intranet\Http\Requests\Panel\UpdateVideosRequest;
use Intranet\Repositories\Panel\VideosRepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VideosController extends AppBaseController
{
    /** @var  VideosRepository */
    private $videosRepository;

    public function __construct(VideosRepository $videosRepo)
    {
        $this->videosRepository = $videosRepo;
    }

    /**
     * Display a listing of the Videos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->videosRepository->pushCriteria(new RequestCriteria($request));
        $videos = $this->videosRepository->all();

        return view('panel.videos.index')
            ->with('videos', $videos);
    }

    /**
     * Show the form for creating a new Videos.
     *
     * @return Response
     */
    public function create()
    {
        return view('panel.videos.create');
    }

    /**
     * Store a newly created Videos in storage.
     *
     * @param CreateVideosRequest $request
     *
     * @return Response
     */
    public function store(CreateVideosRequest $request)
    {
        $input = $request->all();

        $videos = $this->videosRepository->create($input);

        Flash::success('Videos creado con exito.');

        return redirect(route('panel.videos.index'));
    }

    /**
     * Display the specified Videos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $videos = $this->videosRepository->findWithoutFail($id);

        if (empty($videos)) {
            Flash::error('Videos no encontrado.');

            return redirect(route('panel.videos.index'));
        }

        return view('panel.videos.show')->with('videos', $videos);
    }

    /**
     * Show the form for editing the specified Videos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $videos = $this->videosRepository->findWithoutFail($id);

        if (empty($videos)) {
            Flash::error('Videos no encontrado.');

            return redirect(route('panel.videos.index'));
        }

        return view('panel.videos.edit')->with('videos', $videos);
    }

    /**
     * Update the specified Videos in storage.
     *
     * @param  int              $id
     * @param UpdateVideosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVideosRequest $request)
    {
        $videos = $this->videosRepository->findWithoutFail($id);

        if (empty($videos)) {
            Flash::error('Videos no encontrado.');

            return redirect(route('panel.videos.index'));
        }

        $videos = $this->videosRepository->update($request->all(), $id);

        Flash::success('Videos actualizado con exito.');

        return redirect(route('panel.videos.index'));
    }

    /**
     * Remove the specified Videos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $videos = $this->videosRepository->findWithoutFail($id);

        if (empty($videos)) {
            Flash::error('Videos no encontrado.');

            return redirect(route('panel.videos.index'));
        }

        $this->videosRepository->delete($id);

        Flash::success('Videos eliminado con exito.');

        return redirect(route('panel.videos.index'));
    }
}
