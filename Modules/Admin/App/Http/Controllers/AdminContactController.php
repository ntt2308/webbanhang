<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminContactController extends Controller
{
    public function index()
    {   
        $contacts = Contact::paginate(10);
        $viewData = [
            'contacts'=> $contacts
        ];
        return view('admin::contact.index', $viewData);
    }
}
