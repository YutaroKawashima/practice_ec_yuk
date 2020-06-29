<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Services\ManagementService;
use Log;

class ManagementController extends Controller
{
    public function __construct(ManagementService $management_service)
    {
        $this->management_service = $management_service;
    }

    public function management()
    {
        $product = $this->management_service->getProduct();

        return view('management', [
            'product' => $product,
        ]);
    }

    public function register(ProductRequest $request)
    {
        $file_name = '';

        $this->management_service->addProduct($request,$file_name);

        return redirect('/management');
    }

    public function change_status(Request $request)
    {
        $this->management_service->changeStatus($request);

        return redirect('/management');
    }

}
