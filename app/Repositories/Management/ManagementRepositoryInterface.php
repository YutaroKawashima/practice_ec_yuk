<?php

namespace App\Repositories\Management;

interface ManagementRepositoryInterface
{
    public function getProductAll();
    public function registerNewProduct($request, $file_name);
    public function changeStatusPublicOrPrivate($request);
}
