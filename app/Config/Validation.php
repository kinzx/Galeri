<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $login = [
        'email' => 'required|valid_email',
        'password' => 'required|min_length[6]',
    ];
    public $rules = [
        'judul' => 'required|min_length[3]|max_length[255]',
        'lokasifile' => 'uploaded[lokasifile]|max_size[lokasifile,1024]|mime_in[lokasifile,image/jpg,image/jpeg,image/png]',
    ];

    public $messages = [
        'judul' => [
            'required' => 'Field Judul wajib diisi.',
            'min_length' => 'Judul minimal harus memiliki panjang setidaknya 3 karakter.',
            'max_length' => 'Judul maksimal hanya dapat memiliki panjang 255 karakter.',
        ],
        'lokasifile' => [
            'uploaded' => 'Terjadi kesalahan saat mengupload gambar.',
            'max_size' => 'Ukuran gambar terlalu besar. Maksimal 1 MB yang diizinkan.',
            'mime_in' => 'Tipe file gambar tidak diizinkan. Hanya gambar JPG, JPEG, atau PNG yang diizinkan.',
        ],
    ];

    // protected $validationRules = [
    //     'username'     => 'required|alpha_numeric|min_length[5]|max_length[225]|is_unique[user.username]',
    //     'password'     => 'required|min_length[8]',
    //     'email'        => 'required|valid_email|is_unique[user.email]',
    //     'alamat'       => 'required',
    //     'namalengkap'  => 'required',
    // ];
    // public $register_errors = [
    //     'username' => [
    //         'alpha_numeric' => 'Username hanya boleh mengandung huruf dan angka ',
    //         'is_unique' => 'Username sudah dipakai'
    //     ],
    //     'password' => [
    //         'min_length' => 'Password harus memiliki setidaknya 8 karakter',
    //         'alpha_numeric_punct' => 'Password hanya boleh mengandung angka, huruf, dan karakter yang valid',
    //     ],
    //     'confirm' => [
    //         'matches' => 'Konfirmasi password harus sesuai dengan password',
    //     ]
        
        
    // ];
    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
