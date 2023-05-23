<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.add_projects');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validation($request);

        $data = $request->all();

        $newProject = new Project();

        $newProject->name = $data['name'];
        $newProject->desc = $data['desc'];
        $newProject->language = $data['language'];
        $newProject->link = $data['link'];
        $newProject->publication_date = $data['publication_date'];
        $newProject->slug = Str::slug($newProject->name, '-');

        $newProject->save();

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit_project', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validation($request);

        $data = $request->all();


        $project->update($data);

        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }

    private function validation($request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:100',
            'desc' => 'required|max:200',
            'language' => 'required|max:30',
            'publication_date' => 'required',
            'link' => 'required|max:255',
        ], [
            'name.required' => 'Il nome è necessario',
            'name.max' => 'Il nome non può essere più lungo di 100 caratteri',
            'desc.required' => 'Aggiungi una descrizione',
            'desc.max' => 'La descrizione non può essere più lunga di 200 caratteri',
            'language' => "Aggiungi il linguaggio utilizzato",
            'language.max' => "Il linguaggio non può essere più lungo di 50 caratteri",
            'publication_date.required' => 'Aggiungi la data di pubblicazione',
            'link.required' => 'Aggiungi un link',
            'link.max' => 'Il link non può essere cosi lungo',

        ])->validate();
    }
}
