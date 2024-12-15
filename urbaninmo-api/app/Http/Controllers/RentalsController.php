<?php

namespace App\Http\Controllers;

use App\Models\Rentals;
use App\Models\RealEstate;
use App\Models\User;
use App\Models\Comments;
use Illuminate\Http\Request;

class RentalsController extends Controller
{
    public function getRentalsByRealEstateId(Request $request)
    {
        $validated = $request->validate([
            'id_real_estate' => 'required|integer|exists:real_estate,id'
        ]);
        $real_estate_id = $validated['id_real_estate'];
        $rentals = Rentals::where('id_real_estate', $real_estate_id)->get();
        $rentalsWithUser = $rentals->map(function ($rental) {
            $user = User::find($rental->user_id);
            return [
                'id' => $rental->id,
                'id_real_estate' => $rental->id_real_estate,
                'rent_start' => $rental->rent_start,
                'rent_end' => $rental->rent_end,
                'reason_end' => $rental->reason_end,
                'created_at' => $rental->created_at,
                'updated_at' => $rental->updated_at,
                'user_name' => $user ? $user->name : null,
                'user_photo' => $user ? $user->photo : null
            ];
        });

        return response()->json(['status' => 'success', 'rentalsWithUser' => $rentalsWithUser]);
    }


    public function getRentalsWithCommentsByUserId(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer:exists:users,id'
        ]);
        $rentals = Rentals::where('user_id', $validated['user_id'])->get();

        foreach ($rentals as $rental) {

            $realEstate = RealEstate::find($rental->id_real_estate);
            if ($realEstate) {
                $rental->titleRealEstate = $realEstate->title;
            }

            $comments = Comments::where('id_rentals', $rental->id)->first();
            if ($comments) {
                $rental->comments = $comments;
            }
        }
        return response()->json(['status' => 'success', 'rentals' => $rentals]);
    }

    public function getRentalsWithCommentsAndUserByRealEstateId(Request $request)
    {
        $validated = $request->validate([
            'id_real_estate' => 'required|integer|exists:real_estate,id'
        ]);
        $rentals = Rentals::where('id_real_estate', $validated['id_real_estate'])->get();
        $rentals = $rentals->filter(function ($rental) {
            return !is_null($rental->rent_end) && $rental->rent_end !== '';
        })->values()->all();
        $comments = Comments::whereIn('id_rentals', array_column($rentals, 'id'))->get();

        foreach ($comments as $comment) {
            $user = User::find($comment->user_id);
            $comment->user_name = $user ? $user->name : null;
            $comment->user_photo = $user ? $user->photo : null;
        }
        return response()->json(['status' => 'success', 'rentals' => $rentals, "comments" => $comments]);
    }

    public function createRental(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer:exists:users,id',
            'id_real_estate' => 'required|integer:exists:real_estates,id',
            'rent_start' => 'required|date',
            'rent_end' => 'date|nullable|after:rent_start',
            'reason_end' => 'string|nullable'
        ]);

        $rental = Rentals::create(
            [
                'user_id' => $validated['user_id'],
                'id_real_estate' => $validated['id_real_estate'],
                'rent_start' => $validated['rent_start'],
                'rent_end' => $validated['rent_end'],
                'reason_end' => $validated['reason_end']
            ]
        );
        return response()->json(['status' => 'success', 'rental' => $rental]);
    }
    public function editRental(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer:exists:rentals,id',
            'user_id' => 'required|integer:exists:users,id',
            'id_real_estate' => 'required|integer:exists:real_estates,id',
            'rent_start' => 'required|date',
            'rent_end' => 'date|nullable',
            'reason_end' => 'string|nullable'
        ]);

        $rental = Rentals::find($validated['id']);
        if ($rental->user_id != $validated['user_id']) {
            return response()->json(['status' => 'error', 'rental' => null]);
        }
        $rental->update(
            [
                'id_real_estate' => $validated['id_real_estate'],
                'user_id' => $validated['user_id'],
                'rent_start' => $validated['rent_start'],
                'rent_end' => $validated['rent_end'],
                'reason_end' => $validated['reason_end']
            ]
        );
        return response()->json(['status' => 'success', 'rental' => $rental]);
    }

    public function getOnlyRentById(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer:exists:rentals,id'
        ]);
        $rental = Rentals::find($validated['id']);
        $rental->user_name = User::find($rental->user_id)->name;
        if (!$rental) {
            return response()->json(['status' => 'error', 'rental' => null]);
        }
        return response()->json(['status' => 'success', 'rental' => $rental]);
    }
}
