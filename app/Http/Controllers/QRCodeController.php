<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class QRCodeController extends Controller
{
    public function generate($ticket)
    {
        // Generate a QR code for a specific URL
        $qrCode = QrCode::format('png')
            ->size(300)
            ->backgroundColor(255, 255, 0)
            ->color(0, 0, 255)
            ->generate($ticket);

        $qrCodePath = Storage::disk('public')->put('qr-codes', $qrCode);

        return view('/');
    }   
}
