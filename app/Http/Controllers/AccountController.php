<?php

namespace App\Http\Controllers;

use App\Repositories\Rent\Villa\VillaRepositoryInterface;

class AccountController extends Controller
{
    private VillaRepositoryInterface $villaRepository;

    public function __construct(VillaRepositoryInterface $villaRepository)
    {
        $this->villaRepository = $villaRepository;
    }

    public function wishlist($id){

    }
}