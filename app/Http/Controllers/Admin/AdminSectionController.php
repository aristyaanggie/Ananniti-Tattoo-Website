<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Section;
use App\Services\SectionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminSectionController extends Controller
{
    public function __construct(
        protected SectionService $sectionService,
    ) {}

    public function index(): View
    {
        $sections = $this->sectionService->getAllSections()
            ->sortBy('display_order')
            ->values();

        return view('admin.content.index', [
            'pageTitle' => 'Content Management',
            'sections' => $sections,
        ]);
    }

    public function edit(Section $section): View
    {
        return view('admin.content.form', [
            'pageTitle' => 'Edit ' . $section->title,
            'section' => $section,
        ]);
    }

    public function update(UpdateSectionRequest $request, Section $section): RedirectResponse
    {
        $data = $request->validated();
        $this->sectionService->updateSection($section->id, $data);

        return redirect()->route('admin.content.index')
            ->with('success', 'Section updated successfully.');
    }
}
