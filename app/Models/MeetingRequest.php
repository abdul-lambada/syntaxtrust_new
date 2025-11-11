<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingRequest extends Model
{
    /** @use HasFactory<\Database\Factories\MeetingRequestFactory> */
    use HasFactory;

    protected $fillable = [
        'name','method','topic','when_at','meet_link','wa_target','msg_preview','status','sent_via'
    ];
}
