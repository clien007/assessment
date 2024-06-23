<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Jobs\ExportFinancialData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\FinancialDataExported;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    protected $store;
    protected $user;

    public function __construct(Store $store)
    {
        $this->store = $store;
        $this->user = Auth::user();
    }

    public function index()
    {
        $stores = auth()->user()->stores;
        return view('sample', compact('stores'));
    }

    public function show(Store $store)
    {
        $this->authorize('view', $store);

        $colors = explode(',',$store->brand->color);
        $primary_color = $colors[0];
        $secondary_color = $colors[1];
        $text_color = $colors[2];

        return view('stores.show', compact('store','primary_color','secondary_color','text_color'));
    }

    public function export(Store $store)
    {
        ExportFinancialData::dispatch($store);

        return back()->with('status', 'Export is being processed. You will receive an email when it is ready.');
    }
}
