<?php

namespace App\Providers;

use App\Models\items;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        // Collection::macro('pick', function ($cols = ['*']) {
        //     $cols = is_array($cols) ? $cols : func_get_args();
        //     $obj = clone $this;

        //     // Just return the entire collection if the asterisk is found.
        //     if (in_array('*', $cols)) {
        //         return $this;
        //     }

        //     return $obj->transform(function ($value) use ($cols) {
        //         $ret = [];
        //         foreach ($cols as $col) {
        //             // This will enable us to treat the column as a if it is a
        //             // database query in order to rename our column.
        //             $name = $col;
        //             if (preg_match('/(.*) as (.*)/i', $col, $matches)) {
        //                 $col = $matches[1];
        //                 $name = $matches[2];
        //             }

        //             // If we use the asterisk then it will assign that as a key,
        //             // but that is almost certainly **not** what the user
        //             // intends to do.
        //             $name = str_replace('.*.', '.', $name);

        //             // We do it this way so that we can utilise the dot notation
        //             // to set and get the data.
        //             Arr::set($ret, $name, data_get($value, $col));
        //         }

        //         return $ret;
        //     });
        // });
        Collection::macro('pick', function (...$columns) {

            return $this->map(function ($item, $key) use ($columns) {
                $data = [];
                foreach ($columns as $column) {
                    $data[$column] = $item[$column] ?? null;
                }

                return $data;
            });
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Put this inside boot() function
        // Collection::macro('pick', function (...$columns) {
        //     return $this->map(function ($item, $key) use ($columns) {
        //         $data = [];
        //         foreach ($columns as $column) {
        //             $collection_pieces = explode('.', $column);
        //             if (count($collection_pieces) == 2) {
        //                 $data[$collection_pieces[1]] = $item->{$collection_pieces[0]}->{$collection_pieces[1]} ?? null;
        //             } else {
        //                 $data[$column] = $item[$column] ?? null;
        //             }
        //         }
        //         return $data;
        //     });
        // });


        Relation::morphMap([
            'store'=> User::class,
            'item'=> items::class,

        ]);
    }
}
