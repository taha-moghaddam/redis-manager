<?php

namespace Bikaraan\BCore\RedisManager;

use Bikaraan\BCore\Facades\Admin;

trait BootExtension
{
    public static function boot()
    {
        static::registerRoutes();

        Admin::extend('redis-manager', __CLASS__);
    }

    /**
     * Register routes for laravel-admin.
     *
     * @return void
     */
    protected static function registerRoutes()
    {
        parent::routes(function ($router) {
            /* @var \Illuminate\Routing\Router $router */
            $router->get('redis', 'Bikaraan\BCore\RedisManager\RedisController@index')->name('redis-index');
            $router->delete('redis/key', 'Bikaraan\BCore\RedisManager\RedisController@destroy')->name('redis-key-delete');
            $router->get('redis/fetch', 'Bikaraan\BCore\RedisManager\RedisController@fetch')->name('redis-fetch-key');
            $router->get('redis/create', 'Bikaraan\BCore\RedisManager\RedisController@create')->name('redis-create-key');
            $router->post('redis/store', 'Bikaraan\BCore\RedisManager\RedisController@store')->name('redis-store-key');
            $router->get('redis/edit', 'Bikaraan\BCore\RedisManager\RedisController@edit')->name('redis-edit-key');
            $router->put('redis/key', 'Bikaraan\BCore\RedisManager\RedisController@update')->name('redis-update-key');
            $router->delete('redis/item', 'Bikaraan\BCore\RedisManager\RedisController@remove')->name('redis-remove-item');

            $router->get('redis/console', 'Bikaraan\BCore\RedisManager\RedisController@console')->name('redis-console');
            $router->post('redis/console', 'Bikaraan\BCore\RedisManager\RedisController@execute')->name('redis-execute');
        });
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('Redis manager', 'redis', 'fa-database');

        parent::createPermission('Redis Manager', 'ext.redis-manager', 'redis*');
    }
}
