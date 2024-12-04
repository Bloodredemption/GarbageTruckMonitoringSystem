<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Messages;
use App\Models\Users;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app['router']->aliasMiddleware('role', \App\Http\Middleware\UserRoleMiddleware::class);

        View::composer('partials.header', function ($view) {
            // Fetch all users except the authenticated user
            $users = Users::where('id', '!=', auth()->id())->get();
        
            // Fetch latest messages per receiver, avoiding duplicates
            $latestMessages = Messages::with(['sender', 'receiver'])
                ->select('messages.*')
                ->join(
                    \DB::raw('(SELECT MAX(id) as latest_id FROM messages WHERE user_id = '.auth()->id().' GROUP BY receiver_id) as latest_messages'),
                    'messages.id',
                    '=',
                    'latest_messages.latest_id'
                )
                ->orderBy('created_at', 'desc')
                ->get();
        
            // Map messages to their receivers for quick lookup
            $messagesByReceiver = $latestMessages->keyBy('receiver_id');
        
            // Combine users with their latest message, if any
            $usersWithMessages = $users->map(function ($user) use ($messagesByReceiver) {
                $message = $messagesByReceiver->get($user->id); // Fetch latest message for the user
                $user->latest_message = $message ? $message->content : null; // Add message content, if any
                $user->formatted_time = $message ? \Carbon\Carbon::parse($message->created_at)->diffForHumans() : null; // Add formatted time
                return $user;
            });
        
            $view->with('users', $usersWithMessages);
        });
    }
}
