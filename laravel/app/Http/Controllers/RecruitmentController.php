<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $recruitments = Recruitment::latest()->paginate(5);

        return view('recruitments.index',compact('recruitments'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('recruitments.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:6',
            'contact' => 'required|digits:9|unique:recruitments',
            'email_address' => 'required|email|unique:recruitments',
        ]);

        unset($request['_token']);

        Recruitment::create($request->all());

        return redirect()->route('recruitments.index')
                        ->with('success','Recrutamento criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recruitment $recruitment): View
    {
        return view('recruitments.show',compact('recruitment'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recruitment $recruitment): View
    {
        return view('recruitments.edit',compact('recruitment'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recruitment $recruitment): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:6',
            'contact' => 'required|digits:9',
            'email_address' => 'required',
        ]);

        unset($request['_token']);


        $recruitment->update($request->all());

        return redirect()->route('recruitments.index')
                        ->with('success','Recrutamento atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recruitment $recruitment): RedirectResponse
    {
        $recruitment->delete();

        return redirect()->route('recruitments.index')
                        ->with('success','Recrutamento deletado com sucesso');
    }

    public function restore(Recruitment $recruitment): RedirectResponse
    {
        $recruitment->restore(); // Restaurar um contato excluído

        return redirect()->route('recruitments.index')
            ->with('success', 'Recrutamento restaurado com sucesso.');
    }
}
