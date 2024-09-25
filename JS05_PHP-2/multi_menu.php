<?php
$menu = [
    [
        'title' => 'Beranda',
    ],
    [
        'title' => 'Berita',
        'subMenu' => [
            [
                'title' => 'Wisata',
                'subMenu' => [
                    [
                        'title' => 'Pantai',
                    ],
                    [
                        'title' => 'Gunung',
                    ],
                ]
            ],
            [
                'title' => 'Kuliner',
            ],
            [
                'title' => 'Hiburan',
            ]
        ]
    ],
    [
        'title' => 'Tentang',
    ],
    [
        'title' => 'Kontak',
    ]
];

function tampilkanMenuBertingkat(array $menu) {
    echo '<ul>';
    foreach ($menu as $item) {
        echo '<li>' . $item['title'];

        if (isset($item['subMenu'])) {
            tampilkanMenuBertingkat($item['subMenu']);
        }
        echo '</li>';
    }
    echo '</ul>';
}

tampilkanMenuBertingkat($menu);
?>