<?php

namespace App\Http\Controllers\Dashboard;

use App\Book;
use App\Language;
use App\Translator;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class TranslatorController extends Controller
{
    public function index()
    {
        $translators = User::whereRoleIs('translator')->paginate(5);
        return view('dashboard.translators.index', compact('translators'));

    }//end of index

    public function create()
    {
        $books = Book::all();
        $languages = Language::all();
        return view('dashboard.translators.create', compact('books', 'languages'));

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'books' => 'required|array|min:1',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->attachRole('translator');
        
        $user->books()->attach($request->books);

//        $user->syncPermissions($request->permissions);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.translators.index');

    }//end of store

    public function edit(User $translator)
    {
        $books = Book::all();
        $languages = Language::all();
        return view('dashboard.translators.edit', compact('books', 'languages', 'translator'));

    }//end of edit

    public function update(Request $request, User $translator)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [Rule::unique('users')->ignore($translator->id), 'required', 'string', 'email', 'max:255'],
            'books' => 'required|array|min:1',
        ]);

        $translator->update($request->except(['permissions', 'books']));

        $translator->books()->sync($request->books);

        $translator->syncPermissions($request->permissions);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.translators.index');

    }//end of update

    public function destroy(User $translator)
    {
        $translator->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.translators.index');

    }//end of destroy

}//end of controller
