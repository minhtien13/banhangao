<?php
 
namespace App\View\Composers;

use App\Models\contact;
use Illuminate\View\View;
 
class ContactComposer
{
    public function __construct()
    {
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
       $contact = contact::select('title', 'address', 'phone', 'email')->first();
       $view->with('contact', $contact);
    }
}