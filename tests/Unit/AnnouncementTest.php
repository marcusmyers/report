<?php

namespace Marcusmyers\Report\Tests\Unit;

use Carbon\Carbon;
use Marcusmyers\Report\Models\Announcement;
use Marcusmyers\Report\Tests\TestCase;

class AnnouncementTest extends TestCase
{
    protected $announcement;

    public function setUp(): void
    {
        parent::setUp();

        $this->announcement = new Announcement();
        $this->announcement->title = 'The Band That Never Sleeps';
        $this->announcement->description = 'This band never sleeps and it shows! Come out and see them on New Years Eve.';
        $this->announcement->save();
    }

    /** @test */
    public function it_can_access_the_database()
    {
        $foundAnnouncement = Announcement::find($this->announcement->id);

        $this->assertSame($foundAnnouncement->title, 'The Band That Never Sleeps');
    }

    /** @test */
    public function it_can_get_all_active_not_expired_announcements()
    {
        factory(Announcement::class, 3)->create();
        factory(Announcement::class, 3)->create(['active' => 0]);
        factory(Announcement::class, 2)->create(['expires_at' => null]);

        $activeAnnouncements = Announcement::active()->notExpired()->get();

        $this->assertSame($activeAnnouncements->count(), 3);
    }

    /** @test*/
    public function it_can_get_expired_announcements()
    {
        factory(Announcement::class, 3)->create();
        factory(Announcement::class, 3)->create(['active' => 0]);
        factory(Announcement::class, 50)->create(['expires_at' => Carbon::now()->subWeeks(2)]);

        $activeAnnouncements = Announcement::expired()->get();

        $this->assertSame(50, $activeAnnouncements->count());
    }
}
