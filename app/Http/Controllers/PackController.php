<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePackFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Pack;
use Illuminate\Http\Request;

class PackController extends Controller
{
    private $pack;

    public function __construct(Pack $pack)
    {
        $this->pack = $pack;

        $this->middleware('auth')
                    ->except([
                        'index', 'show'
                    ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packs = $this->pack->latest()->paginate();

        return view('packs.index', compact('packs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePostFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePackFormRequest $request)
    {
        $data = $request->all();
        // print_r($data);
        // die();

        $pack = Pack::firstOrNew(array('quantity' => $data['quantity']));
        //$pack->quantity = $data->quantity;
        $pack->save();

        return redirect()
                    ->route('packs.index')
                    ->withSuccess('Create pack successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$pack = $this->pack->find($id))
            return redirect()->back();

        return view('packs.show', compact('pack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$pack = $this->pack->find($id))
            return redirect()->back();

        return view('packs.edit', compact('pack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePostFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePackFormRequest $request, $id)
    {
        if (!$pack = $this->pack->find($id))
            return redirect()->back();

        $data = $request->all();

        $pack->update($data);

        return redirect()
                    ->route('packs.index')
                    ->withSuccess('Update pack successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$pack = $this->pack->find($id))
            return redirect()->back();

        $pack->delete();

        return redirect()
                    ->route('packs.index')
                    ->withSuccess('Delete sucessesful!');
    }
}
