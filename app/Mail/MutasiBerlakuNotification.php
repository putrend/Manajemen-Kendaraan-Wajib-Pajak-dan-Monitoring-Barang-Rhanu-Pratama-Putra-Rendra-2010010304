<?php

namespace App\Mail;

use App\Models\Mutasi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MutasiBerlakuNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $mutasi;

    /**
     * Create a new message instance.
     */
    public function __construct(Mutasi $mutasi)
    {
        $this->mutasi = $mutasi;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $mutasi = Mutasi::where('id', $this->mutasi->id)->first();
        return $this->view('mutasi.mails.berlaku')
            ->subject('Mutasi Berlaku')
            ->with([
                'mutasi' => $mutasi,
            ]);
    }
}
