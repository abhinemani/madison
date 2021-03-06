<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\CommentCreated' => [
            'App\Listeners\CommentCreatedNotification',
        ],
        'App\Events\CommentFlagged' => [
            'App\Listeners\CommentFlaggedNotification',
        ],
        'App\Events\CommentLiked' => [
            'App\Listeners\CommentLikedNotification',
        ],
        'App\Events\DocumentPublished' => [
            'App\Listeners\DocumentPublishedNotification',
        ],
        'App\Events\SponsorCreated' => [
            'App\Listeners\SponsorCreatedNotification',
        ],
        'App\Events\SponsorMemberAdded' => [
            'App\Listeners\SponsorMemberAddedNotification',
        ],
        'App\Events\SponsorMemberRemoved' => [
            'App\Listeners\SponsorMemberRemovedNotification',
        ],
        'App\Events\SponsorMemberRoleChanged' => [
            'App\Listeners\SponsorMemberRoleChangedNotification',
        ],
        'App\Events\SupportVoteChanged' => [
            'App\Listeners\SupportVoteChangedNotification',
        ],
        'App\Events\UserVerificationStatusChange' => [
            'App\Listeners\UserVerificationStatusChangeNotification',
        ],
        'App\Events\UserVerificationRequest' => [
            'App\Listeners\UserVerificationRequestNotification',
        ],
        'Illuminate\Auth\Events\Registered' => [
            'App\Listeners\RegisteredUser',
        ],
        'Illuminate\Notifications\Events\NotificationSending' => [
            'App\Listeners\ShouldSendNotification',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
