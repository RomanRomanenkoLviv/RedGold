<?php

namespace App\Http\Controllers;

use App\Http\Resources\SiteCollection;
use App\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {
        $sites = Site::with('user')->orderBy('updated_at', 'desc')->paginate(15);

        return new SiteCollection($sites);
    }

    public function show(Site $site) {
        return new \App\Http\Resources\Site($site);
    }
}
