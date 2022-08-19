<?php

namespace App\Providers;

<<<<<<< HEAD
use App\Events\PostReceivedNewReply;
=======
>>>>>>> 55f69f4a9333366ae48d958db459a4e717f8326a

use App\Events\PostReceivedNewReply;
use App\Listeners\NotifyMentionedUser;
use App\Listeners\NotifyPostSubscribers;
use App\Listeners\SendEmailConformationRequest;
use App\Models\Favorite;
use App\Models\Reply;
use App\Observers\FavoriteObserver;
use App\Observers\ReplyObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            SendEmailConformationRequest::class
        ],


        PostReceivedNewReply::class =>[
            NotifyMentionedUser::class,
            NotifyPostSubscribers::class
            ],


        
            


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

        Favorite::observe(FavoriteObserver::class);
        Reply::observe(ReplyObserver::class);
    }
}
