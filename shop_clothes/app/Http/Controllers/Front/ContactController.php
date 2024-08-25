<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Contact\ContactService;

class ContactController extends Controller
{

    private $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function contact()
    {
        return view('front.contact.contact');
    }

    public function store(Request $request) {
        $data = $request->all();
        $this->contactService -> create($data);
        return back();
    }

  
}
