<?php

namespace App\Helpers;

class MenuHelper
{
  public static  function getMenu()
  {
    return [
      [
        'name' => 'Dashboard',
        'route' => '',
        'children' => []
      ]
    ];
  }
}
