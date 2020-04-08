<?php

namespace App\Http\Controllers\Api;

use App\Borrowing;
use App\Http\Controllers\Controller;
use App\Notifications\ConfirmedBorrowingNotification;
use App\Replica;
use Illuminate\Http\Request;

class BorrowingsController extends Controller
{
    public function create(Request $request, Replica $replica)
    {
        $borrowings = $replica->borrowings()
            ->where('starting_at', '!=', null)
            ->where('finished_at', '=', null)
            ->get();

        if ($borrowings->count() > 0) {
            return response()->json([
                'status'  => 401,
                'message' => 'Ce livre n\'est pas disponible',
            ], 401);
        }

        $borrowing = new Borrowing();
        $borrowing->replica_id = $replica->id;
        $borrowing->user_id = $request->user()->id;
        $borrowing->starting_at = now()->addDays(2);
        $borrowing->finishing_at = now()->addDays(16);
        $borrowing->save();

        $request->user()->notify(new ConfirmedBorrowingNotification($borrowing));

        return [
            'status'  => 200,
            'message' => 'L\'emprunt a bien été confirmé, un mail récapitulatif vous a été envoyé.',
        ];
    }
}
