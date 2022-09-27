<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Website;
use App\Requests\Website\SubscribeRequest;

class WebsiteController extends Controller
{
    public function subscribes(SubscribeRequest $request)
    {
        $user = User::where('email', $request->get('email'))->first();
        // if user is null, create new user;
        if (is_null($user)) {
            $user = new User;
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->save();
        }

        $website = Website::find($request->get('website_id'));
        if (is_null($website)) {
            return $this->errorResponse('Website Not Found');
        }

        $user->websites()->attach($request->get('website_id'));
        return $this->successResponse('Successfully sbuscribe on website', $website);
    }
}
