<?php

namespace App\Http\Controllers;

use App\Models\Qrcodes;
use Illuminate\Http\Request;

class QrcodesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qrcodes = Qrcodes::all();
        return view('qrcodes.list',['qrcodes' => $qrcodes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('qrcodes.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $qrcode = new Qrcodes();
        $qrcode->titulo = $request->titulo;
        $qrcode->descricao = $request->descricao;
        $qrcode->conteudo = $request->conteudo;
        $qrcode->save();
        return redirect()->route('qrcodes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Qrcodes $qrcode)
    {
        return view('qrcodes.view',['qrcode' => $qrcode]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Qrcodes $qrcode)
    {
        return view('qrcodes.edit',['qrcode' => $qrcode]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Qrcodes $qrcode)
    {
        $qrcode->titulo = $request->titulo;
        $qrcode->descricao = $request->descricao;
        $qrcode->conteudo = $request->conteudo;
        $qrcode->update();
        return redirect()->route('qrcodes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Qrcodes $qrcode)
    {
        $qrcode->delete();
        return redirect()->route('qrcodes.index');
    }
}
