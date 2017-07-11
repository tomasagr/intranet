<?php

namespace Intranet\Http\Controllers\Panel;

use Flash;
use Illuminate\Http\Request;
use Intranet\Http\Controllers\AppBaseController;
use Intranet\Http\Requests\Panel\CreateArchivosProductosRequest;
use Intranet\Http\Requests\Panel\UpdateArchivosProductosRequest;
use Intranet\Models\Panel\ArchivosProductos;
use Intranet\Models\Panel\Productos;
use Intranet\Repositories\Panel\ArchivosProductosRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ArchivosProductosController extends AppBaseController
{
    /** @var  ArchivosProductosRepository */
    private $archivosProductosRepository;

    public function __construct(ArchivosProductosRepository $archivosProductosRepo)
    {
        $this->archivosProductosRepository = $archivosProductosRepo;
    }

    /**
     * Display a listing of the ArchivosProductos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $id)
    {
        $archivosProductos = ArchivosProductos::where('producto_id', $id)->get();
        $productoId = $id;

        return view('panel.archivos_productos.index', compact('archivosProductos', 'productoId'));
    }

    /**
     * Show the form for creating a new ArchivosProductos.
     *
     * @return Response
     */
    public function create($id)
    {
        $producto = Productos::find($id);
        return view('panel.archivos_productos.create', compact('producto'));
    }

    /**
     * Store a newly created ArchivosProductos in storage.
     *
     * @param CreateArchivosProductosRequest $request
     *
     * @return Response
     */
    public function store(CreateArchivosProductosRequest $request)
    {
        $input = $request->all();

        if (!$request->file('archivo')) {
            Flash::error('Archivo requerida.');
            return redirect()->back()->withInput();
        } else {
            $input['archivo'] = $request->file('archivo')->store('productos', 'public');
        }

        $archivosProductos = $this->archivosProductosRepository->create($input);

        Flash::success('Archivos Productos creado con exito.');

        return redirect("/panel/productos/$input[producto_id]/archivos");
    }

    /**
     * Display the specified ArchivosProductos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $archivosProductos = $this->archivosProductosRepository->findWithoutFail($id);

        if (empty($archivosProductos)) {
            Flash::error('Archivos Productos no encontrado.');
            return redirect(route('panel.archivosProductos.index'));
        }

        return view('panel.archivos_productos.show')->with('archivosProductos', $archivosProductos);
    }

    /**
     * Show the form for editing the specified ArchivosProductos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, $archivos)
    {
        $archivosProductos = $this->archivosProductosRepository->findWithoutFail($archivos);
        $producto = Productos::find($id);

        if (empty($archivosProductos)) {
            Flash::error('Archivos Productos no encontrado.');

            return redirect(route('panel.archivosProductos.index'));
        }

        return view('panel.archivos_productos.edit', compact('archivosProductos', 'producto'));
    }

    /**
     * Update the specified ArchivosProductos in storage.
     *
     * @param  int $id
     * @param UpdateArchivosProductosRequest $request
     *
     * @return Response
     */
    public function update(UpdateArchivosProductosRequest $request, $id, $archivo)
    {
        $archivosProductos = $this->archivosProductosRepository->findWithoutFail($archivo);
        $input = $request->all();

        if (empty($archivosProductos)) {
            Flash::error('Archivos Productos no encontrado.');

            return redirect(route('panel.archivosProductos.index'));
        }

        if ($request->file('archivo')) {
            $input['archivo'] = $request->file('archivo')->store('productos', 'public');
        }

        $archivosProductos = $this->archivosProductosRepository->update($input, $archivo);

        Flash::success('Archivos Productos actualizado con exito.');

        return redirect("/panel/productos/$id/archivos");
    }

    /**
     * Remove the specified ArchivosProductos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id, $archivos)
    {
        $archivosProductos = $this->archivosProductosRepository->findWithoutFail($archivos);

        if (empty($archivosProductos)) {
            Flash::error('Archivos Productos no encontrado.');

            return redirect(route('panel.archivosProductos.index'));
        }

        $this->archivosProductosRepository->delete($archivos);

        Flash::success('Archivos Productos eliminado con exito.');

        return redirect("/panel/productos/$id/archivos");
    }
}
