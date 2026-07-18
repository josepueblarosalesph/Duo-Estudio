<?php

use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::view('/proyectos/coldtech', 'projects.coldtech')->name('projects.coldtech');
Route::get('/proyectos/{project}', function (string $project) {
    $projects = config('portfolio.projects');
    abort_unless(isset($projects[$project]), 404);
    $galleryPath = public_path("projects/portfolio/galleries/{$project}");
    $gallery = is_dir($galleryPath)
        ? collect(Illuminate\Support\Facades\File::files($galleryPath))->map->getFilename()->sort(fn ($a, $b) => strnatcasecmp($a, $b))->values()
        : collect();

    return view('projects.show', ['project' => $projects[$project], 'slug' => $project, 'gallery' => $gallery]);
})->name('projects.show');
