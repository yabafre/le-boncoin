<?php

namespace App\Http\Controllers;

use App\Mail\AnnonceDelete;
use App\Mail\AnnoncePost;
use App\Models\Annonce;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AnnonceController extends Controller
{

    public function create()
    {
        return view('annonces.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:15',
            'price' => 'required|numeric',
            'location' => 'required',
            'email' => 'required|email',
            'name' => 'required'
        ]);

        $token = Str::random(16);
        $data = [
            'link' => url('/annonces/validate/' . $token),
        ];
        DB::beginTransaction();
        try {
            Mail::to($request->email)->send(new AnnoncePost($data));
            $annonce = new Annonce();
            $annonce->title = $request->title;
            $annonce->description = $request->description;
            $annonce->price = $request->price;
            $annonce->location = $request->location;
            $annonce->email = $request->email;
            $annonce->name = $request->name;
            $annonce->token = $token;
            $annonce->save();
            DB::commit();
            return redirect()->back()->with('message', 'Votre annonce a été crée veuillez consulter vos mails pour validé votre annonce !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'envoi de l\'annonce.');
        }
    }

    public function validated($token)
    {
        try {
            $annonce = Annonce::where('token', $token)->firstOrFail();
            $annonce->status = true;
            $annonce->save();
            return $this->sendMailDelete($annonce->id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('annonces.create')->with('error', 'Une erreur s\'est produite lors de la validation de l\'annonce.');
        }
    }

    public function sendMailDelete($id)
    {
        try {
            $annonce = Annonce::where('id', $id)->firstOrFail();
            $data = [
                'link' => url('/annonces/delete/' . $annonce->token),
            ];
            Mail::to($annonce->email)->send(new AnnonceDelete($data));
            return redirect()->route('annonces.show', $annonce->id)->with('message', 'Votre annonce à bien été validé, un mail de suppression vous a été envoyé !');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('annonces.create')->with('error', 'Une erreur s\'est produite lors de la validation de l\'annonce.');
        }
    }

    public function show($id)
    {
        try {
            $annonce = Annonce::where('id', $id)->firstOrFail();
            return view('annonces.show', compact('annonce'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('annonces.create')->with('error', 'Une erreur s\'est produite.');
        }
    }

    public function delete($token)
    {
        try {
            $annonce = Annonce::where('token', $token)->firstOrFail();
            $annonce->delete();
            return redirect()->route('annonces.create')->with('message', 'Votre annonce à bien été supprimé !');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('annonces.create')->with('error', 'Une erreur s\'est produite lors de la suppression de l\'annonce.');
        }
    }
}
