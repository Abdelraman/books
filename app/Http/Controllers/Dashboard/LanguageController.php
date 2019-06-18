<?php

namespace App\Http\Controllers\Dashboard;

use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::paginate(5);
        return view('dashboard.languages.index', compact('languages'));

    }//end of index

    public function create()
    {
        return view('dashboard.languages.create');

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Language::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.languages.index');
        
    }//end of store

    public function edit(Language $language)
    {
        return view('dashboard.languages.edit', compact('language'));
        
    }//end of edit

    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $language->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.languages.index');

    }//end of update

    public function destroy(Language $language)
    {
        $language->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.languages.index');

    }//end of destroy

}//end of controller
