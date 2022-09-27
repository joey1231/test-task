<?php

namespace App\Console\Commands;

use App\Jobs\SendNotificationPostJob;
use App\Models\UserNotification;
use App\Models\Website;
use Illuminate\Console\Command;

class SendNotificationWebsiteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'website:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notificaiton to user post created';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $websites = Website::get();

        foreach ($websites as $website) {
            $users = $website->users;
            foreach ($users as $user) {
                $posts = $website->posts;
                foreach ($posts as $post) {
                    if (is_null($notification = UserNotification::where('user_id', $user->id)->where('post_id', $post->id)->first())) {
                        SendNotificationPostJob::dispatch($user, $post);
                    }
                }
            }
        }
    }
}
