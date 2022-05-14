<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\EducationForm;
use App\Models\GraduateDegree;
use App\Models\Group;
use App\Models\Specialty;
use Illuminate\Http\Request;

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
        return view('admin.group.index', compact(['groups']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $courses = Course::all();
        $educationForms = EducationForm::all();
        $graduateDegrees = GraduateDegree::all();
        $specialties = Specialty::all();
        return view('admin.group.create', compact(['courses', 'educationForms', 'graduateDegrees', 'specialties']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_group = new Group();
        $new_group->groupCode = $request->groupCode;
        $new_group->course_id = $request->course_id;
        $new_group->education_form_id = $request->education_form_id;
        $new_group->graduate_degree_id = $request->graduate_degree_id;
        $new_group->numberOfStudents = $request->numberOfStudents;
        $new_group->specialty_id = $request->specialty_id;
        $new_group->save();

        return redirect()->back()->withSuccess('Группа успешна добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Group $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Group $group)
    {
        $courses = Course::all();
        $educationForms = EducationForm::all();
        $graduateDegrees = GraduateDegree::all();
        $specialties = Specialty::all();
        return view('admin.group.edit', compact(['group', 'courses', 'educationForms', 'graduateDegrees', 'specialties']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->groupCode = $request->groupCode;
        $group->course_id = $request->course_id;
        $group->educationForm_id = $request->educationForm_id;
        $group->graduateDegree_id = $request->graduateDegree_id;
        $group->numberOfStudents = $request->numberOfStudents;
        $group->specialty_id = $request->specialty_id;
        $group->save();

        return redirect()->back()->withSuccess('Группа успешна обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Group $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->back()->withSuccess('Группа была успешна удалена!');
    }
}
