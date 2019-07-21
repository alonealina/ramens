<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ramen; // 追加

class RamensController extends Controller
{
    public function index()
    {
        
        //$ramens = Ramen::raw('select *, (select avg(fivestar) from posts where ramen_id = ramens.id) as avg from ramens order by avg desc;')->paginate(10);
        
        $ramens = Ramen::select('*', \DB::raw('(select round(avg(fivestar),2) from posts where ramen_id = ramens.id) as avg') )->orderByRaw('avg desc')->paginate(10);
        
        return view('ramens.index', [
            'ramens' => $ramens,
        ]);
    }
    
    public function show($id)
    {
        $ramen = Ramen::find($id);
        $postsr = $ramen->postsr()->orderBy('created_at', 'desc')->paginate(10);
        $auth_user_post_count = $ramen->postsr()->where('user_id', \Auth::id())->count();
        
        // dd($auth_user_post_count);
        
        $data = [
            'ramen' => $ramen,
            'postsr' => $postsr,
            'auth_user_post_count' => $auth_user_post_count,
        ];

         $data += $this->countsr($ramen);

        
        

        return view('ramens.show',$data);
    }
    
}