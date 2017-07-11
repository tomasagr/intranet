<?php

namespace Intranet\Http\Controllers\Panel;

use Intranet\Http\Requests\Panel\CreateProductosRequest;
use Intranet\Http\Requests\Panel\UpdateProductosRequest;
use Intranet\Repositories\Panel\ProductosRepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductosController extends AppBaseController
{
    /** @var  ProductosRepository */
    private $productosRepository;

    public function __construct(ProductosRepository $productosRepo)
    {
        $this->productosRepository = $productosRepo;
    }

    /**
     * Display a listing of the Productos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productosRepository->pushCriteria(new RequestCriteria($request));
        $productos = $this->productosRepository->all();

        return view('panel.productos.index')
            ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new Productos.
     *
     * @return Response
     */
    public function create()
    {
        return view('panel.productos.create');
    }

    /**
     * Store a newly created Productos in storage.
     *
     * @param CreateProductosRequest $request
     *
     * @return Response
     */
    public function store(CreateProductosRequest $request)
    {
        $input = $request->all();
        if (!$request->file('logo')) {
            dd($input);
            Flash::error('Logo requerido.');
            return redirect()->back()->withInput();
        } else {
            $input['logo'] = $request->file('logo')->store('productos', 'public');
        }

        $productos = $this->productosRepository->create($input);

        Flash::success('Productos creado con exito.');

        return redirect(route('panel.productos.index'));
    }

    /**
     * Display the specified Productos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productos = $this->productosRepository->findWithoutFail($id);

        if (empty($productos)) {
            Flash::error('Productos no encontrado.');

            return redirect(route('panel.productos.index'));
        }

        return view('panel.productos.show')->with('productos', $productos);
    }

    /**
     * Show the form for editing the specified Productos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productos = $this->productosRepository->findWithoutFail($id);

        if (empty($productos)) {
            Flash::error('Productos no encontrado.');

            return redirect(route('panel.productos.index'));
        }

        return view('panel.productos.edit')->with('productos', $productos);
    }

    /**
     * Update the specified Productos in storage.
     *
     * @param  int              $id
     * @param UpdateProductosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductosRequest $request)
    {
        $productos = $this->productosRepository->findWithoutFail($id);
        $input = $request->all();

        if (empty($productos)) {
            Flash::error('Productos no encontrado.');

            return redirect(route('panel.productos.index'));
        }

        if ($request->file('logo')) {
            $input['logo'] = $request->file('logo')->store('productos', 'public');
        }

        $productos = $this->productosRepository->update($input, $id);

        Flash::success('Productos actualizado con exito.');

        return redirect(route('panel.productos.index'));
    }

    /**
     * Remove the specified Productos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productos = $this->productosRepository->findWithoutFail($id);

        if (empty($productos)) {
            Flash::error('Productos no encontrado.');

            return redirect(route('panel.productos.index'));
        }

        $this->productosRepository->delete($id);

        Flash::success('Productos eliminado con exito.');

        return redirect(route('panel.productos.index'));
    }
}
