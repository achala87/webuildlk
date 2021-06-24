<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{
    public function index()
    {
        $audits = \OwenIt\Auditing\Models\Audit::with('user')
            ->orderBy('created_at', 'desc')->get();
            //dd($audits);
        return view('audits', ['audits' => $audits]);
    }
}
