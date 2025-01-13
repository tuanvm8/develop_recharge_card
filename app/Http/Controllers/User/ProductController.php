<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\WatchVideoHistory;
use App\Models\User;

use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function home()
    {
        // dd(24454);
        // $storage = app('firebase.storage');
        // $defaultBucket = $storage->getBucket();

        // $items = Product::whereDate('date_product', today())
        //     ->orderBy('date_product', 'desc')
        //     ->limit(5)
        //     ->get();

        // if (Auth::check()) {
        //     $items = Product::whereDate('date_product', today())
        //         ->whereNotIn('id', function ($query) {
        //             $query->select('product_id')
        //                 ->from('watch_video_history');
        //         })
        //         ->orderBy('date_product', 'desc')
        //         ->limit(5)
        //         ->get();
        // }
        // foreach ($items as $imageName) {
        //     $signedUrl = $defaultBucket->object($imageName->image)->signedUrl(now()->addHours(5));
        //     $imageName->image = $signedUrl;
        // }

        return view('user.index');
    }
    
    public function phone() {
        return view('user.phone-card');
    }

    public function loadedPhone() {
        return view('user.loader-phone');
    }

    public function dataCard() {
        return view('user.data-card');
    }
    public function today_video()
    {
        $storage = app('firebase.storage');
        $defaultBucket = $storage->getBucket();

        $items = Product::whereDate('date_product', today())
            ->orderBy('date_product', 'desc')
            ->limit(5)
            ->get();
        if (Auth::check()) {
            $items = Product::whereDate('date_product', today())
                ->whereNotIn('id', function ($query) {
                    $query->select('product_id')
                        ->from('watch_video_history');
                })
                ->orderBy('date_product', 'desc')
                ->limit(5)
                ->get();
        }

        foreach ($items as $imageName) {
            $signedUrl = $defaultBucket->object($imageName->image)->signedUrl(now()->addHours(5));
            $imageName->image = $signedUrl;
        }
        return view('user.today_video', ['items' => $items]);
    }
    

    
}
