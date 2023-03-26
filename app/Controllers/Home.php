<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $rekomendasi_kos = $this->kosModel->find([5, 3, 2]);
        $data = [
            "title" => "Home | SahabatRantauKu.com",
            'rekomendasi_kos' => $rekomendasi_kos,
        ];
        return view('pages/landingPage', $data);
    }
}
