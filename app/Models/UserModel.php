<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as MythModel;

class UserModel extends MythModel
{
    protected $allowedFields = [
        'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
        'fullname', 'phone', 'foto',
    ];

    protected $validationRules = [
        'phone'            => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nomor WA Harus dimasukkan agar penghuni kos dapat menghubungi Anda'
            ]
        ],
        'email'         => [
            'rules' => 'required|valid_email|is_unique[users.email,id,{id}]',
            'errors' => [
                'required' => "Silahkan masukkan email Anda",
                'valid_email' => "Email yang Anda masukkan tidak valid",
                'is_unique' => "Email yang Anda masukkan sudah dipakai",
            ]
        ],
        'username'      => [
            'rules' => 'required|alpha_numeric_punct|min_length[3]|max_length[30]|is_unique[users.username,id,{id}]',
            'errors' => [
                'required' => "Silahkan masukkan username Anda",
                'alpha_numeric_punct' => "Pastikan nama Anda sudah benar",
                'is_unique' => "Username yang Anda masukkan sudah dipakai",
                'min_length' => "Username terlalu pendek",
                'max_length' => "Username terlalu panjang",
            ]
        ],
        'fullname' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Silahkan masukkan Nama Anda'
            ]
        ],
        'password_hash' => 'required',
    ];
}
