<?php


namespace App\Http\Views\Composers;


use Illuminate\View\View;

class AuthUserComposer
{
    public function compose(View $view)
    {
        $user = auth()->user();
        $user->load('profile.image');

        $view->with('user', $user);
    }
}
