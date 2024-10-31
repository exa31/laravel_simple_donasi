<?php

namespace App\Livewire;

use App\Models\Donasi;
use Livewire\Component;
use \Midtrans\Snap;

class CreateDonation extends Component
{
    public $nama;
    public $email;
    public $amount;
    public $donation_type;
    public $catatan;

    public $snapToken;

    public function mount()
    {

        $this->snapToken = null;
    }
    public function send()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'amount' => 'required|numeric',
            'donation_type' => 'required',
        ]);

        $donasi = Donasi::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'donation_type' => $this->donation_type,
            'amount' => $this->amount,
            'catatan' => $this->catatan,
        ]);
        $params = array(
            'transaction_details' => array(
                'order_id' => $donasi->id,
                'gross_amount' => $this->amount,
            )
        );

        $this->snapToken = Snap::getSnapToken($params);
        $this->dispatch('snapTokenGenerated', $this->snapToken);
        // return redirect('/');
    }
    public function render()
    {
        return view('livewire.create-donation');
    }
}
