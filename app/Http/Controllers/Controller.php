<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user) {
        $count_posts = $user->posts()->count();

        return [
            'count_posts' => $count_posts,
        ];
    }
    
    public function countsr($ramen) {
        $count_postsr = $ramen->postsr()->count();

        return [
            'count_postsr' => $count_postsr,
        ];
    }
}
