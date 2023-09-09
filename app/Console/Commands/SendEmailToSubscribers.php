<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use App\Mail\SendNewPostEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailToSubscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-to-subscribers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to subscribers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $newPosts = Post::where('is_send', 0)
                ->get()
                ->groupBy('website_id');

            $subscribtions = DB::table('website_subscribtions')->get();

            foreach ($newPosts as $key => $websitePost) {
                foreach ($websitePost as $post) {
                    foreach ($subscribtions as $sub) {

                        if ($sub->website_id == $key) {
                            $user = User::select('email')->find($sub->user_id);

                            $email = new SendNewPostEmail($post['title'], $post['description']);
                            Mail::to($user->email)->send($email);

                            dump($post->id . ' | ' . $post->title . '- post was sent to ' . $user->email);
                            dump('_____________________________');
                        }
                    }

                    $post->is_send = 1;
                    $post->save();
                }
            }

            dump('DONE');
        } catch (\Throwable $e) {
            Log::error($e);
        }
    }
}
