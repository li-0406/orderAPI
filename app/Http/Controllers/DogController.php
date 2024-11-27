<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\View\View;

class DogController extends Controller{
    public function getDogInfo(): View {
        $response = Http::get('https://dog.ceo/api/breeds/image/random');

        if ($response->failed()) { #這邊簡略處理 status code >= 400的error
            return view('/error'); #寫一個error畫面告知失敗
        }

        $result = json_decode($response);
        return view('/dog', [ 'info' => $result ]);
    }
}