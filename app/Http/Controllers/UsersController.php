<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Transformers\UsersTransform;
use Illuminate\Support\Facades\Hash;
use App\Serializers\DataArraySansIncludeSerializer;

class UsersController extends Controller
{

    public function index()
    {
        return view('users.index');
    }

    public function show(User $user)
    {
        $query = $user->all();

        return DataTables::of($query)
            ->setTransformer(new UsersTransform($query))
            ->setSerializer(new DataArraySansIncludeSerializer())
            ->setTotalRecords($query->count('id'))
            ->make(true);
    }


    public function create()
    {
        //
    }

    public function store(Request $request, User $user)
    {
        $payload = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user->create($payload);
        return response()->json(['message' => 'success'], 200);
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
