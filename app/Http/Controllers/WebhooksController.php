<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhooksController extends Controller
{
    public function inboundMessage(Request $request) {
        \Log::debug('Inbound Message', $request->all());
    }

    public function messageStatus(Request $request) {
        \Log::debug('Message Status', $request->all());
    }
}
