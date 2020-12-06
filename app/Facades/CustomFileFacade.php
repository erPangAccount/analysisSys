<?php

namespace App\Facades;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
/**
 * @method static array upload(Request $request)
 * @method static array rmFile(int $userId, string $filePath)
 *
 */
class CustomFileFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'CustomFile';
    }

}
