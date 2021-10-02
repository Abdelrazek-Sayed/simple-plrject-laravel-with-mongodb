<?php

namespace App\Http\Controllers;

use App\Models\Grandson;
use App\Models\Son;
use Illuminate\Http\Request;

class GrandSonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('son_id')  && $request->input('son_id') !== '') {
            $grandsons = Grandson::where('son_id', $request->son_id)->get();;
        } else {
            $grandsons = collect([]);
            auth()->user()->sons()->each(function ($son) use ($grandsons) {
                $grandsons->add($son->grandsons);
            });
            $grandsons = collect($grandsons->flatten());
        }
        return view('grandsons.index', compact('grandsons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sons = auth()->user()->sons;
        return view('grandsons.create', compact('sons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'son_id' => 'required',
            'name' => 'required',
            'birth_date' => 'required|date_format:Y-m-d',
        ]);

        $grandson = Grandson::create([
            'son_id' => $request->input('son_id'),
            'name' => $request->input('name'),
            'birth_date' => $request->input('birth_date'),
        ]);

        if ($grandson) {
            return back()->with('status', 'Grandson added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grandson = Grandson::find($id);
        $sons = auth()->user()->sons;
        return view('grandsons.edit', compact('grandson', 'sons'));
    }


    public function update(Request $request, Grandson $grandson)
    {
        $request->validate([
            'son_id' => 'required',
            'name' => 'required',
            'birth_date' => 'required|date_format:Y-m-d',
        ]);
        $grandson->update([
            'son_id' => $request->input('son_id'),
            'name' => $request->input('name'),
            'birth_date' => $request->input('birth_date'),
        ]);

        if ($grandson) {
            return back()->with('status', 'Grandson updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grandson $grandson)
    {
        $grandson->delete();

        return back()->with('status', 'Grandson deltede');
    }
}
