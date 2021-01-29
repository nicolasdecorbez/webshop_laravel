<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;


class AjaxController extends Controller
{
    public function connected(Request $request)
    {
      $number=DB::table('users')->where('active', 1)->count();
      return $number;
    }

    public function commandNumber(Request $request)
    {
      $commands=DB::table('buy')->count();
      return $commands;
    }

    public function bigCommand(Request $request)
    {
      $bigest = 0;
      $commands=DB::table('buy')->select('total')->get();
      foreach ($commands as $commands) {
        if ($bigest < $commands->total) {
          $bigest = $commands->total;
        }
      }
      return $bigest;
    }
}
