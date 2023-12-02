<?php 

namespace App\view\composers;

use App\Models\soclai;
use Illuminate\View\View;
 
class SoclaiComposer
{
    public function __construct()
    {
    }
    
    public function compose(View $view)
    {
       $soclai = soclai::where('is_active', 1)->select('name', 'slug_link', 'thumb')->get();
       $view->with('soclai', $soclai);
    }
}