<?php

namespace App\Domain\CMS\Http\Controllers\CMS;

use App\Domain\CMS\Actions\Component\ComponentStoreAction;
use App\Domain\CMS\DTO\Components\ComponentStoreDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComponentController extends Controller
{

    public function store(Request $request, ComponentStoreAction $componentStoreAction)
    {
        $componentStoreAction->handle(ComponentStoreDTO::from($request->all()));
    }

}
