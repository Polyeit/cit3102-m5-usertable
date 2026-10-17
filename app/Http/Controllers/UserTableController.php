<?php

namespace App\Http\Controllers;

use App\Models\UserTable;
use Illuminate\Http\Request;

class UserTableController extends Controller
{
    public function index(Request $request)
    {
        $allowed = ['UName', 'UAge', 'UCity', 'UEmail'];

        $query = UserTable::query();

        foreach ($allowed as $field) {
            if ($request->filled($field)) {
                $query->where($field, $request->query($field));
            }
        }

        return response()->json($query->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'UName'  => 'required|string|max:255',
            'UAge'   => 'required|integer|min:0',
            'UCity'  => 'required|string|max:255',
            'UEmail' => 'required|email|max:255',
        ]);

        $record = UserTable::create($data);

        return response()->json($record, 201);
    }

    public function show(UserTable $userTable)
    {
        return response()->json($userTable, 200);
    }

    public function update(Request $request, UserTable $userTable)
    {
        $data = $request->validate([
            'UName'  => 'required|string|max:255',
            'UAge'   => 'required|integer|min:0',
            'UCity'  => 'required|string|max:255',
            'UEmail' => 'required|email|max:255',
        ]);

        $userTable->update($data);

        return response()->json($userTable, 200);
    }

    public function destroy(UserTable $userTable)
    {
        $userTable->delete();

        return response()->noContent(); // 204
    }
}
