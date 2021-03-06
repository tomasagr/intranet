<?php

namespace Intranet\Http\Controllers\Panel;

use Intranet\Http\Requests\Panel\CreateUserRequest;
use Intranet\Http\Requests\Panel\UpdateUserRequest;
use Intranet\Repositories\Panel\UserRepository;
use Intranet\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Gate;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (Gate::denies('show-user')) {
            return redirect('/panel');
        }

        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->all();

        return view('panel.users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('panel.users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        Flash::success('User guardado con exito.');

        return redirect(route('panel.users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('panel.users.index'));
        }

        return view('panel.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (Gate::denies('edit-user')) {
            return redirect('/panel');
        }

        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('panel.users.index'));
        }

        return view('panel.users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);
        $input = $request->all();
        $file = $input['file'] ?? null;
        
        if (empty($user)) {
            Flash::error('Usuario no encontrado');
            return redirect(route('panel.users.index'));
        }

        if (!is_null($request["file"])) {
            $path = $input["file"]->store('avatars', 'public');
            
            $input['avatar'] = $path;
        }

        $user = $this->userRepository->update($input, $id);

        Flash::success('User actualizado con exito.');

        return redirect(route('panel.users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('panel.users.index'));
        }
        
        if (count($user->voting)) {
            Flash::error('El usuario no se puede eliminar el mismo tiene votos asociados.');
        } else {
            $this->userRepository->delete($id);
            Flash::success('Usuario eliminado con exito.');
        }
        return redirect(route('panel.users.index'));
    }
}
