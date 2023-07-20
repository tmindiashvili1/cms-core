<?php

namespace App\Domain\ContentTypeBuilder\Http\Controllers;

use App\Domain\ContentTypeBuilder\Actions\Component\ComponentStoreAction;
use App\Domain\ContentTypeBuilder\DTO\Components\ComponentStoreDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    
    public function store(Request $request, ComponentStoreAction $componentStoreAction)
    {
        $componentStoreAction->handle(ComponentStoreDTO::from($request->all()));
    }
}
