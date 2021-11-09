<?php

use App\Enums\PoolType;
use App\Enums\RentPeriod;
use App\Enums\VillaType;

return [
    VillaType::class => [
        VillaType::Villa => 'Villa',
        VillaType::Home => 'Ev',
        VillaType::Apart => 'Apart',
    ],
    RentPeriod::class => [
        RentPeriod::Day => 'Günlük',
        RentPeriod::Week => 'Haftalık',
        RentPeriod::Mounth => 'Aylık',
     ],

    PoolType::class => [
        PoolType::DetachedPool => 'Müstakil Havuz',
        PoolType::Private => 'Özel Havuz',
        PoolType::KidsPool => 'Çocuk Havuzu',
        PoolType::NoPool => 'Havuz Yok',
    ],
];
