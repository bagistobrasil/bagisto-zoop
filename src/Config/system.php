<?php
/**
 * Copyright (c) 2020. Levante Lab. All rights reserved.
 * @author    Felippe Simoes <felippesteixeira@gmail.com>
 */

return [
    [
        'key' => 'sales.paymentmethods.zoopcardconfig',
        'name' => 'Zoop (Cartão de Crédito) - Settings',
        'sort' => 100,
        'fields' => [
            [
                'name' => 'sandbox',
                'title' => 'admin::app.admin.system.sandbox',
                'type' => 'boolean',
                'validation' => 'required',
                'channel_based' => false,
                'locale_based' => true,
            ],
            [
                'name' => 'marketplace_id',
                'title' => 'Marketplace ID',
                'type' => 'text',
                'validation' => 'required',
                'locale_based' => true,
                'channel_based' => false
            ],
            [
                'name' => 'zpk',
                'title' => 'ZPK',
                'type' => 'text',
                'validation' => 'required',
                'info' => __('In your zoop account, got to: My account > Settings > ZPK'),
                'locale_based' => true,
                'channel_based' => false
            ],
        ]
    ],
    // [
    //     'key' => 'sales.paymentmethods.zoopboleto',
    //     'name' => 'Zoop (Boleto)',
    //     'sort' => 100,
    //     'fields' => [
    //         [
    //             'name' => 'title',
    //             'title' => __('Title'),
    //             'type' => 'text',
    //             'validation' => 'required',
    //             'channel_based' => false,
    //             'locale_based' => true
    //         ],
    //         [
    //             'name' => 'active',
    //             'title' => 'admin::app.admin.system.status',
    //             'type' => 'select',
    //             'options' => [
    //                 [
    //                     'title' => __('Active'),
    //                     'value' => true
    //                 ], [
    //                     'title' => __('Inactive'),
    //                     'value' => false
    //                 ]
    //             ],
    //             'validation' => 'required'
    //         ],
    //         [
    //             'name' => 'instructions',
    //             'title' => __('Instructions'),
    //             'type' => 'text',
    //             'validation' => 'required',
    //             'channel_based' => false,
    //             'locale_based' => true,
    //         ],
    //     ]
    // ]
];