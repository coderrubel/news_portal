<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Contact;

class footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $contact = Contact::first();
       // return view('components/footer',compact('footer'));
        return view('components.footer',compact('contact'));
    }
}
