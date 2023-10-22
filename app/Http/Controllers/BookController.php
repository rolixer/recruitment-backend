<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class BookController extends Controller
{
    public function getSearchView(string $query = '')
    {
        return view('search', ['query' => $query]);
    }

    public function search(Request $request)
    {
        $query = htmlspecialchars($request->input('query'), ENT_QUOTES, 'UTF-8', false);

        return $this->getSearchView($query);
    }
}
