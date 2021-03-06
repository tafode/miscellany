<?php

return [
    'characters'    => [
        'description'   => 'Likovi na lokaciji.',
        'title'         => 'Lokacije lika :name',
    ],
    'create'        => [
        'description'   => 'Kreiraj novu lokaciju',
        'success'       => 'Kreirana lokacija ":name".',
        'title'         => 'Nova lokacija',
    ],
    'destroy'       => [
        'success'   => 'Uklonjena lokacija ":name".',
    ],
    'edit'          => [
        'success'   => 'Ažurirana lokacija ":name".',
        'title'     => 'Uredi lokaciju :name',
    ],
    'events'        => [
        'description'   => 'Događaji koji su se zbili na lokaciji.',
        'title'         => 'Događaji lokacije :name',
    ],
    'families'      => [
        'title' => 'Obitelji lokacije :name',
    ],
    'fields'        => [
        'characters'        => 'Likovi',
        'image'             => 'Slika',
        'is_map_private'    => 'Privatna mapa',
        'location'          => 'Lokacija',
        'locations'         => 'Lokacije',
        'map'               => 'Mapa',
        'name'              => 'Naziv',
        'relation'          => 'Odnos',
        'type'              => 'Tip',
    ],
    'helpers'       => [
        'characters'    => 'Pregledaj sve likove na ovoj lokaciji i njenim podlokacijama ili samo one neposredno na toj lokaciji.',
        'descendants'   => 'Popis sadrži sve lokacije koje su unutar trenutne lokacije, a ne samo one koje su direktno ispod nje.',
        'families'      => 'Lokacije mogu biti sjedište moćnih obitelji.',
        'map'           => 'Dodavanje mape na lokaciju će omogućiti stavljanje "Oznaka" na mapu, povezujući ih na druge entitete u kampanji.',
        'nested'        => 'U "Ugniježđenom pregledu" možeš vidjeti lokacije na ugniježđeni način. Lokacije bez lokacije roditelj će biti prikazane na osnovnom pregledu. Lokacije s podlokacijama se mogu kliknuti kako bi se prikazale te podlokacije. Možeš nastaviti klikati dok ima podlokacija za prikazati.',
        'organisations' => 'Pregledaj sve organizacije na ovoj lokaciji i njenim podlokacijama ili samo one locirane neposredno ovdje.',
    ],
    'hints'         => [
        'is_map_private'    => 'Privatna mapa je vidljiva samo članovima "Administrator" uloge u kampanji.',
    ],
    'index'         => [
        'actions'       => [
            'explore_view'  => 'Ugniježđeni pogled',
        ],
        'add'           => 'Nova lokacija',
        'description'   => 'Upravljanje lokacijama u :name',
        'header'        => 'Lokacije u :name',
        'title'         => 'Lokacije',
    ],
    'items'         => [
        'description'   => 'Predmeti koji se nalaze u lokaciji ili su s lokacije.',
        'title'         => 'Predmeti lokacije :name',
    ],
    'journals'      => [
        'description'   => 'Dnevnici napisani na lokaciji.',
        'title'         => 'Dnevnici iz lokacije :name',
    ],
    'locations'     => [
        'description'   => 'Lokacije unutar lokacije.',
        'title'         => 'Lokacije unutar lokacije :name',
    ],
    'map'           => [
        'actions'   => [
            'admin_mode'        => 'Omogući Način uređivanja',
            'big'               => 'Puni pregled',
            'confirm_delete'    => 'Sigurno želiš obrisati ovu oznaku na mapi?',
            'download'          => 'Preuzimanje',
            'points'            => 'Uredi oznake',
            'toggle_hide'       => 'Sakrij oznake',
            'toggle_show'       => 'Prikaži oznake',
            'view_mode'         => 'Povratak na način rada Pregled',
            'zoom_in'           => 'Približi',
            'zoom_out'          => 'Udalji',
            'zoom_reset'        => 'Vrati izvorno povećanje',
        ],
        'helper'    => 'Klikni na mapu za dodavanje nove oznake na lokaciji ili klikni na postojeću oznaku da ju izmjeniš ili izbrišeš.',
        'helpers'   => [
            'admin' => 'Omogući dodavanje oznaka klikanjem bilo gdje na mapi, uređivanje oznaka klikanjem na postojeće, te pomicanje oznaka povlačenjem.',
            'info'  => 'Više informacija o mapama.',
            'label' => 'Ova oznaka je natpis. Ništa više, ništa manje.',
            'view'  => 'Klikni na bilo koju oznaku mape za prikaz njenih detalja. Koristi Ctrl + kotačić miša za približavanje i udaljavanje na mapi.',
        ],
        'legend'    => 'Legenda',
        'modal'     => [
            'submit'    => 'Dodaj',
            'title'     => 'Meta nove oznake',
        ],
        'no_map'    => 'Možeš učitati mapu na ovu lokaciju dok je uređuješ. Kad je mapa učitana, prikazat će se ovdje.',
        'points'    => [
            'empty_label'   => 'Neimenovana oznaka',
            'fields'        => [
                'axis_x'    => 'X os',
                'axis_y'    => 'Y os',
                'colour'    => 'Pozadinska boja',
                'icon'      => 'Ikona',
                'name'      => 'Natpis',
                'shape'     => 'Oblik',
                'size'      => 'Veličina',
            ],
            'helpers'       => [
                'location_or_name'  => 'Oznaka mape može biti postojeći entitet ili samo natpis.',
            ],
            'icons'         => [
                'anchor'        => 'Sidro',
                'anvil'         => 'Nakovanj',
                'apple'         => 'Jabuka',
                'aura'          => 'Zračenje',
                'axe'           => 'Sjekira',
                'beer'          => 'Pivo',
                'biohazard'     => 'Opasan biološki materijal',
                'book'          => 'Knjiga',
                'bridge'        => 'Most',
                'campfire'      => 'Logorska vatra',
                'candle'        => 'Svijeća',
                'capitol'       => 'Kapitol',
                'castle-emblem' => 'Dvorac',
                'cat'           => 'Mačka',
                'cheese'        => 'Sir',
                'cog'           => 'Zupčanik',
                'crown'         => 'Kruna',
                'dead-tree'     => 'Mrtvo drvo',
                'diamond'       => 'Dijamant',
                'dragon'        => 'Zmaj',
                'emerald'       => 'Smaragd',
                'entity'        => 'Slika odabranog entiteta',
                'fire'          => 'Vatra',
                'flask'         => 'Pljoska',
                'flower'        => 'Cvijet',
                'horseshoe'     => 'Potkova',
                'hourglass'     => 'Pješčani sat',
                'hydra'         => 'Hidra',
                'kaleidoscope'  => 'Kaleidoskop',
                'key'           => 'Ključ',
                'lever'         => 'Poluga',
                'meat'          => 'Meso',
                'octopus'       => 'Hobotnica',
                'palm-tree'     => 'Palma',
                'pin'           => 'Pribadača',
                'pine-tree'     => 'Bor',
                'player'        => 'Osoba',
                'potion'        => 'Napitak',
                'reactor'       => 'Reaktor',
                'repair'        => 'Popravljanje',
                'sheep'         => 'Ovca',
                'shield'        => 'Štit',
                'skull'         => 'Lubanja',
                'snake'         => 'Zmija',
                'spades-card'   => 'Pik',
                'sprout'        => 'Izdanak',
                'sun'           => 'Sunce',
                'tentacle'      => 'Krak',
                'toast'         => 'Tost',
                'tombstone'     => 'Nadgrobni spomenik',
                'torch'         => 'Baklja',
                'tower'         => 'Toranj',
                'vase'          => 'Vaza',
                'water-drop'    => 'Voda',
                'wooden-sign'   => 'Zadatak',
                'wrench'        => 'Odvijač',
            ],
            'modal'         => 'Kreiraj ili uredi oznaku na mapi',
            'placeholders'  => [
                'axis_x'    => 'Lijeva pozicija',
                'axis_y'    => 'Gornja pozicija',
                'name'      => 'Natpis oznake kad nema lokacije.',
            ],
            'return'        => 'Povratak na :name',
            'shapes'        => [
                'circle'    => 'Krug',
                'square'    => 'Kvadrat',
            ],
            'sizes'         => [
                'huge'      => 'Golema',
                'large'     => 'Velika',
                'small'     => 'Mala',
                'standard'  => 'Normalna',
                'tiny'      => 'Sitna',
            ],
            'success'       => [
                'create'    => 'Oznaka lokacije kreirana.',
                'delete'    => 'Oznaka lokacije uklonjena.',
                'update'    => 'Oznaka lokacije ažurirana.',
            ],
            'title'         => 'Oznake lokacije :name',
        ],
        'success'   => 'Oznake spremljene.',
    ],
    'organisations' => [
        'description'   => 'Organizacije smještene na lokaciji.',
        'title'         => 'Organizacije lokacije :name',
    ],
    'panels'        => [
        'map'   => 'Mapa',
    ],
    'placeholders'  => [
        'location'  => 'Odaberi lokaciju roditelj',
        'name'      => 'Naziv lokacije',
        'type'      => 'Grad, Kraljevstvo, Ruševina',
    ],
    'quests'        => [
        'description'   => 'Zadaci u koje je lokacija uključena.',
        'title'         => 'Zadaci lokacije :name',
    ],
    'show'          => [
        'description'   => 'Detaljan pregled lokacije',
        'tabs'          => [
            'characters'    => 'Likovi',
            'events'        => 'Događaji',
            'families'      => 'Obitelji',
            'information'   => 'Informacije',
            'items'         => 'Predmeti',
            'journals'      => 'Dnevnici',
            'locations'     => 'Lokacije',
            'map'           => 'Mapa',
            'menu'          => 'Izbornik',
            'organisations' => 'Organizacije',
            'quests'        => 'Zadaci',
        ],
        'title'         => 'Lokacija :name',
    ],
];
