<?php

namespace Marcusmyers\Report;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Marcusmyers\Report\Skeleton\SkeletonClass
 */
class ReportFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'report';
    }
}
