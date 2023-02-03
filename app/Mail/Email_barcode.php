<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
 
class Email_barcode extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function build()
    {
        // $file =public_path('indah\divisi/'.$this->data['foto']);
        // $file =$this->data['foto'];
        // dd($file);
        return $this->markdown('production/finishing/packing_list/email_receiving')
        ->subject('PENGIRIMAN PACKINGLIST TO EKSPEDISI ')
        ->with('data', $this->data);
        // ->attach($file);

    }
}

