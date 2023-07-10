<?php

namespace App\Http\Controllers;

use App\Models\Qrcodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
class QrcodesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // QrCode::format('png')->size('300')->generate('Make me into a QrCode!',storage_path('qr.png'));
        // QrCode::format('png')->size('300')->generate($qrcode->conteudo,storage_path()."/app/public/qrcodes/".$qrcode->id.".png" );



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
        // var_dump($request->file('logo'));
        // $request->file('logo')->store('imagens');
        // return "arquivo salvo";



        $qrcode = new Qrcodes();
        $qrcode->titulo = $request->titulo;
        $qrcode->tipo = $request->tipo;
        $qrcode->descricao = $request->descricao;
        $qrcode->conteudo = $request->conteudo;
        $qrcode->logo = $request->logo->store('imagens','public');
        $qrcode->save();
        if(!$qrcode->save()) {
            return "falha ao gerar qr";
        }

        $dirLogo = "/public/storage/".$qrcode->logo;
        $dirQrcode = storage_path()."/app/public/qrcodes/".$qrcode->id.".png";

        QrCode::format('png')->size('300')->merge($dirLogo)->generate($qrcode->conteudo,$dirQrcode);
        return redirect()->route('qrcodes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Qrcodes $qrcode)
    {
        // return view('qrcodes.view',['qrcode' => $qrcode]);
        $pdf = PDF::loadView('pdf',compact('qrcode'));
        return $pdf->setPaper('a4')->stream('qrcode');
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
        $qrcode->tipo = $request->tipo;
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
