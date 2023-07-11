<?php

namespace App\Http\Controllers;

use App\Models\Qrcodes;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use Exception;
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
        $qrcode = new Qrcodes();
        $qrcode->titulo     = $request->titulo;
        $qrcode->descricao  = $request->descricao;
        $qrcode->conteudo   = $request->conteudo;
        $qrcode->logo       = $request->logo->store('logos','public');
        $qrcode->background = $request->background->store('background','public');
        if(!$qrcode->save()) {
            return "falha ao gerar qr";
        }

        $dirLogo = "/public/storage/".$qrcode->logo;
        $dirQrcode = storage_path()."/app/public/qrcodes/".$qrcode->id.".png";

        QrCode::format('png')->size('300')->errorCorrection('H')->merge($dirLogo,.4)->generate($qrcode->conteudo,$dirQrcode);
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
        // $qrcode->tipo = $request->tipo;
        $qrcode->descricao = $request->descricao;
        $qrcode->conteudo = $request->conteudo;
        if ( !empty($request->logo) ) {
            $qrcode->logo = $request->logo->store('imagens','public');
        }
        if ( !empty($request->background) ) {
            $qrcode->background = $request->background->store('background','public');
        }

        $dirLogo = "/public/storage/".$qrcode->logo;
        $dirQrcode = storage_path()."/app/public/qrcodes/".$qrcode->id.".png";
        QrCode::format('png')->size('300')->errorCorrection('H')->merge($dirLogo,.4)->generate($qrcode->conteudo,$dirQrcode);
        $qrcode->update();
        return redirect()->route('qrcodes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Qrcodes $qrcode)
    {
        try {
            $dirQr      = 'storage/qrcodes/'.$qrcode->id.".png";
            $dirLogo    = 'storage/'.$qrcode->logo;

            if (file_exists($dirLogo) && file_exists($dirLogo)) {
                unlink(public_path($dirQr));
                unlink(public_path($dirLogo));
            }
            $qrcode->delete();
            return redirect()->route('qrcodes.index');
        } catch (\Exception $e) {
            return $e->getMessage();
            return redirect()->route('qrcodes.index');
        }


    }
}
