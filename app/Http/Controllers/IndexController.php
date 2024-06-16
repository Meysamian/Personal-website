<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function about()
    {
        return redirect('/#about');
    }

    public function services()
    {
        return redirect('/#services');
    }

    public function experiences()
    {
        return redirect('/#experiences');
    }

    public function educations()
    {
        return redirect('/#educations');
    }

    public function skills()
    {
        return redirect('/#skills');
    }

    public function certifications()
    {
        return redirect('/#certifications');
    }

    public function interests()
    {
        return redirect('/#interests');
    }

    public function contact()
    {
        return redirect('/#contact');
    }
}
