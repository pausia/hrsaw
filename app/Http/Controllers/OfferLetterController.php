<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OfferLetterMail;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\PDF;

class OfferLetterController extends Controller
{
    public function tampilLetter()
    {
        // Tampilkan halaman formulir kirim surat tawaran
        return view('offerletter.tampilLetter');
    }

    public function sendOfferLetter(Request $request)
    {
        try {
            // Validasi input formulir
            $request->validate([
                'sub_email' => 'required|email',
                'full_name' => 'required|string',
                'company_email' => 'required|email',
                'position' => 'required|string',
                'letter_content' => 'required|string',
                'attachment' => 'required|file|mimes:pdf|max:2048', // Hanya file PDF dengan maksimal 2MB
            ]);

            // Periksa apakah file ada
            if ($request->hasFile('attachment')) {
                // Periksa ukuran file
                $attachment = $request->file('attachment');
                $fileSize = $attachment->getSize(); // Ukuran file dalam byte

                if ($fileSize > 2097152) { // 2 MB dalam byte
                    // File lebih besar dari 2 MB, tampilkan Sweet Alert
                    Alert::warning('Peringatan!', 'File PDF tidak boleh lebih dari 2 MB.');
                    return redirect()->back();
                }

                // Generate the offer letter content
                $offerLetterContent = "Dear {$request->input('full_name')},\n\nCongratulations! We are pleased to extend an offer for the position of {$request->input('position')} at our company.\n\n{$request->input('letter_content')}\n\nBest regards,\nYour Company Name";

                // Kirim email menggunakan Mailtrap
                Mail::to($request->input('sub_email'))
                    ->send(new OfferLetterMail(
                        $request->input('sub_email'),
                        $request->input('full_name'),
                        $request->input('company_email'),
                        $request->input('position'),
                        $request->input('letter_content'),
                        $attachment // Kirim file
                    ));

                // Tambahkan log atau pesan sukses jika diperlukan
                Alert::success('Sukses!', 'Surat tawaran telah berhasil dikirim.');

                // Tampilkan halaman "Offer Letter" setelah pengguna mengirim formulir
                return view('offerletter.offer_letter', [
                    'full_name' => $request->input('full_name'),
                    'position' => $request->input('position'),
                    'letter_content' => $offerLetterContent,
                    'company_email' => $request->input('company_email'),
                    'offer_letter_pdf_url' => '', // Set URL atau path ke PDF jika diperlukan
                ]);
            } else {
                // Handle jika tidak ada file terlampir
                Alert::warning('Peringatan!', 'Mohon lampirkan file PDF.');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            // Tangkap dan tampilkan pesan kesalahan
            Alert::error('Error!', $e->getMessage());
            return redirect()->back();
        }
    }
}
