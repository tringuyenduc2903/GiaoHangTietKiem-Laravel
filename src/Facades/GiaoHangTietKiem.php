<?php

namespace TriNguyenDuc\GiaoHangTietKiem\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TriNguyenDuc\GiaoHangTietKiem\GiaoHangTietKiem
 */
class GiaoHangTietKiem extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \TriNguyenDuc\GiaoHangTietKiem\GiaoHangTietKiem::class;
    }
}
