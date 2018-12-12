<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;

use App\Notifications\FreeText;

class WebhooksController extends Controller
{
    public function inboundMessage(Request $request) {
        \Log::debug('Inbound Message', $request->all());

        // The incoming message contains the platform + contact details that
        // we need to reply with, so configure a notification route with those
        // details
        $from = $request->input('from');
        $channel = 'nexmo-' . $from['type'];
        $sender = Notification::route($channel, $from['id']);

        // Try and find the recipe name that was sent to us
        $recipeName = $request->input('message.content.text');
        $recipe = \App\Recipe::where('name', $recipeName)->first();
        if (!$recipe) {
            $sender->notify(new FreeText(
                "I couldn't find that recipe",
                $channel
            ));
            return;
        }

        // If we get this far, we have a recipe! Time to schedule some notifications
        // We use ->delay() to delay the notification by X seconds, which is exactly
        // what we need to do to make the messages appear when action should be taken
        foreach ($recipe->timings()->get() as $t) {
            $sender->notify((new FreeText(
                $t->action,
                $channel
            ))->delay($t->start_time));
        }
    }

    public function messageStatus(Request $request) {
        \Log::debug('Message Status', $request->all());
    }
}
