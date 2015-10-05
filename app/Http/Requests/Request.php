<?php

// namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;

// abstract class Request extends FormRequest
// {
//     //
// }
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    /**
     * Update the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function updateProfile(Request $request)
    {
        if ($request->user()) {
            // $request->user() returns an instance of the authenticated user...
        }
    }
}
