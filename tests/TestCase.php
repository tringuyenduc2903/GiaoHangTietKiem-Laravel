<?php

namespace TriNguyenDuc\GiaoHangTietKiem\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use TriNguyenDuc\GiaoHangTietKiem\GiaoHangTietKiemServiceProvider;

class TestCase extends Orchestra
{
    public function getEnvironmentSetUp($app): void
    {
        //
    }

    protected function getPackageProviders($app): array
    {
        return [
            GiaoHangTietKiemServiceProvider::class,
        ];
    }
}
