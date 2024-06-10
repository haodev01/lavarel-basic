<?php

namespace App\Http\View\Composers;

use App\Helpers\MenuHelper;
use Illuminate\View\View;

class MenuComposer
{

  public function __construct()
  {
  }
  public function compose(View $view)
  {
    dd(MenuHelper::getMenu());
    $view->with('menuItems', MenuHelper::getMenu());
  }
}
