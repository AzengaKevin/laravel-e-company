<?php


namespace App\Http\Views\Composers;


use App\User;
use Illuminate\View\View;

class TeamComposer
{
    public function compose(View $view)
    {
        $users = User::admins()->latest()->limit(3)->get();

        $view->with('users', $users);
    }
}
