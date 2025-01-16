<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['permission:user-read'])->only('index');
    //     $this->middleware(['permission:user-create'])->only('create');
    //     $this->middleware(['permission:user-create'])->only('store');
    //     $this->middleware(['permission:user-read'])->only('show');
    //     $this->middleware(['permission:user-update'])->only('edit');
    //     $this->middleware(['permission:user-update'])->only('update');
    //     $this->middleware(['permission:user-delete'])->only('destroy');
    // }

    public function index()
    {
        return view('admin.auth.index', [
            'users' => User::with(['roles'])->latest('id')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.auth.create');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $data = array_merge($request->validated(), [
            'uuid' => Str::uuid(),
        ]);
        // dd($data);
        $user = User::create($data);

        $user->roles()->sync($request->roles);

        return to_route('users.index')->with(notify(config('flash-message.store_message'), 'success'));
    }

    public function show(User $user)
    {
        $role = DB::table('roles')->find(DB::table('role_user')->whereUserId($user->id)->first()->role_id) ;
        return view('admin.auth.show', compact('user', 'role'));
    }

    public function edit(User $user)
    {
        return view('admin.auth.edit', [
            'roles' => User::ROLES,
            'user' => $user,
        ]);
    }

    public function update(RegisterRequest $request, User $user)
    {
        //Check if new password is define before update
        $request->password ? $user->update($request->safe()->all()) : $user->update($request->safe()->except(['password']));

        return to_route('users.index')->with(notify(config('flash-message.update_message'), 'info'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return to_route('users.index')->with(notify(config('flash-message.destroy_message'), 'danger'));
    }
}
