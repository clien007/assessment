<?php

namespace App\Mail;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FinancialDataExported extends Mailable
{
    use Queueable, SerializesModels;

    public $filePath;
    public $store;

    public function __construct($filePath, Store $store)
    {
        $this->filePath = $filePath;
        $this->store = $store;
    }

    public function build()
    {
        return $this->subject('Financial Data for ' . $this->store->brand->name . ' - Store Number: ' . $this->store->store_number)
                    ->view('emails.financial_data_exported')
                    ->attach(storage_path('app/' . $this->filePath));
    }
}

