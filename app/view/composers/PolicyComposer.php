<?php 

namespace App\view\composers;

use App\Models\policy;
use Illuminate\View\View;
 
class PolicyComposer
{
    public function __construct()
    {
    }
    
    public function compose(View $view)
    {
       $policy = policy::where('is_active', 1)->select('title', 'link_url', 'is_type')->get();
       $view->with('policy', $policy);
    }
}