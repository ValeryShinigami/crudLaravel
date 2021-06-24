<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;




class BookController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth', 'admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->get();
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            "nomDuLivre" => ["required", "string", "max:255", 'unique:books'],
            "nomAuteur" => ["required", "string", "max:255"],
            "avis" => ["required", "string", "max:255"],
            "note" => ["required", "integer", "max:255"],
        
        ], 
        [
            "nomDuLivre.required" => "entrez le nom de votre livre",
            "nomDuLivre.string" => "entrez une chaine de caratère valide",
            "nomDuLivre.max" => "entrez au maximum 255 caractères",
            "nomDuLivre.unique" => "ce nom existe déjà",

            "nomAuteur.required" => "entrez le nom de votre livre",
            "nomAuteur.string" => "entrez une chaine de caratère valide",
            "nomAuteur.max" => "entrez au maximum 255 caractères",
            "nomAuteur.unique" => "ce nom existe déjà",


        ]);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        

        Book::create([

            "nomDuLivre" => $request->nomDuLivre,
            "nomAuteur" => $request->nomAuteur,
            "avis" => $request->avis,
            "note" => $request->note,
        ]);

        return redirect()->route('admin.book.index')->with(["success" => "article ajouté"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
