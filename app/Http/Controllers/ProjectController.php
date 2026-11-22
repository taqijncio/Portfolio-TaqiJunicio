<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /** tambah proyek */
    public function create()
    {
        return view('projects.form', ['project' => null]);
    }

    /** edit proyek */
    public function edit(Project $project)
    {
        return view('projects.form', ['project' => $project]);
    }

    /** CREATE */
    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request);
        }

        Project::create($data);

        return $this->back('Proyek berhasil ditambahkan.');
    }

    /** UPDATE */
    public function update(Request $request, Project $project)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $project->deleteImageFile();
            $data['image'] = $this->storeImage($request);
        }

        $project->update($data);

        return $this->back('Proyek berhasil diperbarui.');
    }

    /** DELETE */
    public function destroy(Project $project)
    {
        $project->deleteImageFile();
        $project->delete();

        return $this->back('Proyek berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title'       => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
            'category'    => ['required', 'string', 'max:50'],
            'url'         => ['nullable', 'url', 'max:255'],
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);
    }

    private function storeImage(Request $request): string
    {
        return 'storage/' . $request->file('image')->store('projects', 'public');
    }

    private function back(string $message)
    {
        return redirect()->route('dashboard')->with('success', $message);
    }
}
