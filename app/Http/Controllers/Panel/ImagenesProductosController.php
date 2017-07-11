<?php

namespace Intranet\Http\Controllers\Panel;

use Flash;
use Illuminate\Http\Request;
use Intranet\Http\Controllers\AppBaseController;
use Intranet\Http\Requests\Panel\CreateImagenesProductosRequest;
use Intranet\Http\Requests\Panel\UpdateImagenesProductosRequest;
use Intranet\Models\Panel\ImagenesProductos;
use Intranet\Models\Panel\Productos;
use Intranet\Repositories\Panel\ImagenesProductosRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ImagenesProductosController extends AppBaseController
{
    /** @var  ImagenesProductosRepository */
    private $imagenesProductosRepository;

    public function __construct(ImagenesProductosRepository $imagenesProductosRepo)
    {
        $this->imagenesProductosRepository = $imagenesProductosRepo;
    }

    /**
     * Display a listing of the ImagenesProductos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $id)
    {
        $imagenesProductos = ImagenesProductos::where('product_id', $id)->get();
        $productoId = $id;

        return view('panel.imagenes_productos.index', compact('imagenesProductos', 'productoId'));
    }

    /**
     * Show the form for creating a new ImagenesProductos.
     *
     * @return Response
     */
    public function create($id)
    {
        $producto = Productos::find($id);
        return view('panel.imagenes_productos.create', compact('producto'));
    }

    /**
     * Store a newly created ImagenesProductos in storage.
     *
     * @param CreateImagenesProductosRequest $request
     *
     * @return Response
     */
    public function store(CreateImagenesProductosRequest $request)
    {
        $input = $request->all();

        if (!$request->file('imagen')) {
            Flash::error('Imagen requerida.');
            return redirect()->back()->withInput();
        } else {
            $input['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        $imagenesProductos = $this->imagenesProductosRepository->create($input);

        Flash::success('Imagenes Productos creado con exito.');

        return redirect("/panel/productos/$input[product_id]/imagenes");
    }

    /**
     * Display the specified ImagenesProductos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $imagenesProductos = $this->imagenesProductosRepository->findWithoutFail($id);

        if (empty($imagenesProductos)) {
            Flash::error('Imagenes Productos no encontrado.');

            return redirect(route('panel.imagenesProductos.index'));
        }

        return view('panel.imagenes_productos.show')->with('imagenesProductos', $imagenesProductos);
    }

    /**
     * Show the form for editing the specified ImagenesProductos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, $imagen)
    {
        $imagenesProductos = $this->imagenesProductosRepository->findWithoutFail($imagen);
        $producto = Productos::find($id);

        if (empty($imagenesProductos)) {
            Flash::error('Imagenes Productos no encontrado.');

            return redirect(route('panel.imagenesProductos.index'));
        }

        return view('panel.imagenes_productos.edit', compact('imagenesProductos', 'producto'));
    }

    /**
     * Update the specified ImagenesProductos in storage.
     *
     * @param  int              $id
     * @param UpdateImagenesProductosRequest $request
     *
     * @return Response
     */
    public function update(UpdateImagenesProductosRequest $request, $id, $imagen)
    {
        $imagenesProductos = $this->imagenesProductosRepository->findWithoutFail($imagen);
        $input = $request->all();

        if (empty($imagenesProductos)) {
            Flash::error('Imagenes Productos no encontrado.');

            return redirect(route('panel.imagenesProductos.index'));
        }

        if ($request->file('imagen')) {
            $input['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        $imagenesProductos = $this->imagenesProductosRepository->update($input, $imagen);

        Flash::success('Imagenes Productos actualizado con exito.');

        return redirect("/panel/productos/$id/imagenes");
    }

    /**
     * Remove the specified ImagenesProductos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id, $imagenes)
    {
        $imagenesProductos = $this->imagenesProductosRepository->findWithoutFail($imagenes);

        if (empty($imagenesProductos)) {
            Flash::error('Imagenes Productos no encontrado.');

            return redirect(route('panel.imagenesProductos.index'));
        }

        $this->imagenesProductosRepository->delete($imagenes);

        Flash::success('Imagenes Productos eliminado con exito.');

        return redirect("/panel/productos/$id/imagenes");
    }
}
