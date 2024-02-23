<?php

namespace App\Http\Controllers\Skill;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        public function showSkillIndex()
        {
            return view('skill.index');
        }
    }
}
