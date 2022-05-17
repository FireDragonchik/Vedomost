<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $groups = Group::paginate(10);
        return view('user.group.index', compact(['groups']));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Group $group)
    {
        $students = DB::table('students')->select('*')->orderBy('studentId')
            ->where('group_id', '=', $group->id)
            ->get()->toArray();
        return view('user.group.show', compact(['group', 'students']));
    }
}
