<?php

namespace App\Domain\CMS\Actions\Component;

use App\Domain\CMS\DTO\Components\ComponentStoreDTO;
use App\Domain\Core\Models\StoreSetting;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ComponentStoreAction
{

    public function handle(ComponentStoreDTO $componentStoreDTO)
    {
        if (StoreSetting::where('key',$componentStoreDTO->getKey())->exists() === false) {

        }

        Schema::create($componentStoreDTO->getTableName(), function (Blueprint $table) {
            $table->id();
            $table->string('key')->index()->nullable();
            $table->json('value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }

}
