<?php

namespace App\Repositories\Management;

use App\Product;
use App\Stock;

class ManagementRepository implements ManagementRepositoryInterface
{
    protected $product;

    public function __construct(Product $product, Stock $stock)
    {
        $this->product = $product;
        $this->stock = $stock;
    }

    public function getProductAll()
    {
        $product = $this->product->all();
        return $product;
    }

    public function registerNewProduct($request, $file_name)
    {

        $this->product->name = $request->name;
        $this->product->price = $request->price;
        $this->product->image = $file_name;
        $this->product->status = $request->status;
        $this->product->save();

        $this->stock->product_id = $this->product->id;
        $this->stock->stock = $request->stock;
        $this->stock->save();
    }

    public function changeStatusPublicOrPrivate($request)
    {
        $product = $this->product->where('id', $request->product_id)->first();

        if ( $request->change_status === '0' ) {

            $product->status = 0;

        } else if ( $request->change_status === '1' ) {

            $product->status = 1;

        }

        $product->save();
    }

}
