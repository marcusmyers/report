<?php

namespace Marcusmyers\Report\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
	protected $guarded = [];
	protected $table = 'announcements';

	protected $dates = [
		'expires_at',
	];

	public function scopeActive($query)
    {
    	return $query->where('active', 1);
    }

    public function scopeNotExpired($query)
    {
        return $query->whereDate('expires_at', '>', Carbon::now()->toDateString());
    }

    public function scopeExpired($query)
    {
        return $query->whereDate('expires_at', '<=', Carbon::now()->toDateString());
    }
}
