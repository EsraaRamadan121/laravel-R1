<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Contact;
  
class ContactController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contactForm');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

   /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:100|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);
  
        Contact::create($request->all());
  
        return 'ADD';
    }
     /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}