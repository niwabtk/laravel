<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        Group::create($request->all());
        return redirect()->route('groups.index');
    }

    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $group->update($request->all());
        return redirect()->route('groups.index');
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.index');
    }
}