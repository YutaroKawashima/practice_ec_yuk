<?php

namespace App\Services;

use App\Repositories\Management\ManagementRepositoryInterface;

class ManagementService
{

    private $management_repository;

    public function __construct(ManagementRepositoryInterface $management_repository)
    {
        $this->management_repository = $management_repository;
    }

    public function getProduct()
    {
        $product = $this->management_repository->getProductAll();

        return $product;
    }

    public function addProduct($request, $file_name)
    {
        $image = $request->file('image');

        if (isset($image) === TRUE ) {
            $ext = $image->guessExtension();

            $file_name = str_random(20) . '{$ext}';

            $path = $image->storeAs('photos', $file_name, 'public');
        }

        $this->management_repository->registerNewProduct($request, $file_name);
    }

    public function changeStatus($request)
    {
        $this->management_repository->changeStatusPublicOrPrivate($request);
    }
}
