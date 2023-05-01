<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('memos.index', [
            'memos' => Memo::forAuthenticatedAdmin()->latest()->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('memos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        Memo::create($request->all());

        return redirect()->route('memos.index')->with('success', 'Memo has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Memo $memo)
    {
        return view('memos.show', [
            'memo' => $memo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Memo $memo)
    {
        return view('memos.edit', [
            'memo' => $memo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Memo $memo)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $memo->update($request->all());

        return redirect()->back()->with('success', 'Memo has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Memo $memo)
    {
        $memo->delete();

        return redirect()->route('memos.index')->with('success', 'Memo has been deleted successfully!');
    }
}
