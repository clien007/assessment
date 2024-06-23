<?php

namespace App\Jobs;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\FinancialDataExported;
use Illuminate\Support\Facades\Auth;

class ExportFinancialData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $store;
    protected $user;

    public function __construct(Store $store)
    {
        $this->store = $store;
        $this->user = Auth::user();
    }

    public function handle()
    {
        $fileName = 'financial_data_'  . $this->store->store_number .'-'. $this->store->id . '.csv';
        $filePath = 'exports/' . $fileName;

        $handle = fopen(storage_path('app/' . $filePath), 'w');
        fputcsv($handle, ['Date', 'Revenue', 'Food Cost', 'Labor Cost', 'Profit']);

        foreach ($this->store->financials as $financial) {
            fputcsv($handle, [
                $financial->date,
                $financial->revenue,
                $financial->food_cost,
                $financial->labor_cost,
                $financial->profit,
            ]);
        }

        fclose($handle);

        Mail::to($this->user->email)->send(new FinancialDataExported($filePath,$this->store));

        return 'exit';
    }
}

