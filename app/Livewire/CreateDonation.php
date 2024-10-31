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
        $this->validate(
            [
                'nama' => 'required',
                'email' => 'required|email',
                'amount' => 'required|numeric',
                'donation_type' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'amount.required' => 'Jumlah donasi tidak boleh kosong',
                'amount.numeric' => 'Jumlah donasi harus berupa angka',
                'donation_type.required' => 'Tipe donasi tidak boleh kosong',
            ]
        );

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
        $this->reset(['nama', 'email', 'amount', 'donation_type', 'catatan']);
    }
    public function render()
    {
        return view('livewire.create-donation');
    }
}
