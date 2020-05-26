<?php
return array(
    'admin/category/view/([1-9]+)' => 'admin/category/view/$1',
    'admin/category/update/([1-9]+)' => 'admin/category/update/$1',
    'admin/category/delete' => 'admin/category/delete',
    'admin/category/create' => 'admin/category/create',

    'admin/product/view/([1-9]+)' => 'admin/product/view/$1',
    'admin/product/update/([1-9]+)' => 'admin/product/update/$1',
    'admin/product/delete' => 'admin/product/delete',
    'admin/product/create' => 'admin/product/create',

    'admin/dashboard/search'=>'admin/dashboard/search',
    'admin/dashboard/prtab'=>'admin/dashboard/prtab',
    'admin/dashboard/logout'=>'admin/dashboard/logout',

    'admin/category' => 'admin/category/index',
    'admin/product'=>'admin/product/index',
    'admin/login' => 'admin/dashboard/login',
    'admin' => 'admin/dashboard/index',
    'error' => 'site/error',

    'user/login' => 'user/login',
    'user/register' => 'user/register',

    'site/basket'=>'site/basket',
    'site/baskdel/([1-9]+)'=>'site/baskdel/$1',
    'site/buy/([1-9]+)'=>'site/buy/$1',
    'site/view/([1-9]+)'=>'site/view/$1',
    'site/logout'=>'site/logout',
    'site/about'=>'site/about',
    'site/products/([1-9]+)'=>'site/products/$1',
    'site/product'=>'site/product',
    'site/contact' => 'site/contact',
    'site/settings/([1-9]+)'=>'site/settings/$1',
    '' => 'site/index',
);

