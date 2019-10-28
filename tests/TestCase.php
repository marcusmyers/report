<?php

namespace Marcusmyers\Report\Tests;

use Marcusmyers\Report\ReportServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__.'/../database/factories');
    }

    protected function getPackageProviders($app)
    {
        return [ ReportServiceProvider::class ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'AnnouncementReport' => 'Marcusmyers\Report\ReportFacade'
        ];
    }

    protected function getEnvironmentSetup($app)
    {
        include_once __DIR__.'/../database/migrations/create_announcements_table.php.stub';

        (new \CreateAnnouncementsTable)->up();
    }
}
