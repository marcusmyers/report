<?php

namespace Marcusmyers\Report;

use Marcusmyers\Report\Models\Announcement;

class Report
{
    protected $announcements;

    public function __construct()
    {
        $this->announcements = [];
    }

    public function getAnnouncements()
    {
        return Announcement::active()->notExpired()->get();
    }
}
