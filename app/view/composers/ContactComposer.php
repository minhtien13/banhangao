<?php
 
namespace App\view\composers;

use App\Models\contact;
use Illuminate\View\View;
 
class ContactComposer
{
    public function __construct()
    {
    }
    
    public function compose(View $view)
    {
       $contact = contact::select('title', 'address', 'phone', 'email')->first();
       $view->with('contact', $contact);
    }
}