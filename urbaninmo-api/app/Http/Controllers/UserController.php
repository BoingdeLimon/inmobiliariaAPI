<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $photosController;

    public function __construct(PhotosController $photosController)
    {
        $this->photosController = $photosController;
    }
    // ! OLIVER FUNCIONES
    public function getAllUsers()
    {
        return ['status' => 'success', 'users' => User::all()];
    }
    public function getUserById(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:users,id',
        ]);
        $user = User::find($validatedData['id']);
        if (!$user) {
            return response()->json(['status' => 'error']);
        }
        return ['status' => 'success', 'user' => $user];
    }

    public function updateUser(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            // 'password' => 'required|string|min:8',
            'phone' => 'nullable|string|max:10',
            'photo' => 'nullable|string',
            'role' => 'nullable|string',
        ]);
        
        $user = User::findOrFail($validatedData['id']);
        if (!$user) {
            return response()->json(['status' => 'errror']);
        }
        
        $photoRequest = new Request([
            'photo' => $validatedData['photo'],
            'oldPhoto' => $user->photo
        ]);
        $fileName = $this->photosController->newImageUser($photoRequest);
        if($fileName !== 'unknown'){
            $validatedData['photo'] = $fileName;
        }else{
            $validatedData['photo'] = $user->photo;
        }
        $user->update($validatedData);
        return response()->json(['status' => 'success', 'user' => $user]);
    }

    public function deleteUser(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:users,id',
        ]);
        $id = $request->id;
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json(['status' => 'errror']);
        }
        $user->delete();
        return response()->json(['status' => 'success']);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'nullable|string|max:10',
            'photo' => 'nullable|string',
            'role' => 'nullable|string',
        ]);

        //! Los usuarios se dividen en: admin, user, mod
        $data['password'] = bcrypt($data['password']);
        $role = $data['role'] ?? 'user';
        $data['role'] = $role;
        $user = User::create($data);

        return response()->json($user, 201);
    }

    public function filterUser(Request $request)
    {
        $query = User::query();

        $filters = ['name', 'email', 'phone', 'role'];

        foreach ($filters as $filter) {
            if ($request->has($filter)) {
                if ($filter == 'role') {
                    $query->where($filter, $request->$filter);
                } else {
                    $query->where($filter, 'like', '%' . $request->$filter . '%');
                }
            }
        }
        $users = $query->get(['id', 'name']);

        return response()->json($users);
    }


    //!

    public function index()
    {
        return User::all();
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
    public function searchEmail($email)
    {
        $user = User::where('email', $email)->first();
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|required|string|min:8',
            'phone' => 'sometimes|required|string|max:10',
            'photo' => 'nullable|string',
        ]);

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
