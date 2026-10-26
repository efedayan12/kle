<?php

return [
    'required' => ':attribute alanı zorunludur.',
    'string' => ':attribute metin olmalıdır.',
    'numeric' => ':attribute bir sayı olmalıdır.',
    'email' => ':attribute geçerli bir e-posta adresi olmalıdır.',
    'unique' => 'Bu :attribute zaten kullanılıyor.',
    'confirmed' => ':attribute tekrarı eşleşmiyor.',
    'decimal' => ':attribute en fazla 2 ondalık basamak içerebilir.',

    'min' => [
        'numeric' => ':attribute en az :min olmalıdır.',
        'string' => ':attribute en az :min karakter olmalıdır.',
    ],
    'max' => [
        'numeric' => ':attribute en fazla :max olabilir.',
        'string' => ':attribute en fazla :max karakter olabilir.',
    ],

    'attributes' => [
        'name' => 'Ürün adı',
        'price' => 'Fiyat',
        'description' => 'Açıklama',
        'full_name' => 'İsim soyisim',
        'email' => 'E-posta',
        'password' => 'Şifre',
    ],
];
