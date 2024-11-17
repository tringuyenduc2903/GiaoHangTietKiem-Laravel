<?php

namespace TriNguyenDuc\GiaoHangTietKiem;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class GiaoHangTietKiemServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('giaohangtietkiem-laravel')
            ->hasConfigFile();
    }
}
