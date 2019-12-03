<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\Ability;
use App\AbilityPokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;

use App\Http\Requests\PokemonRequest;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemon = Pokemon::paginate(10);
        
        $ability= Ability::All();
        
        $abilityPokemon= AbilityPokemon::All();
        
        return view('pokemon/pokemon')->with(['pokemons' => $pokemon, 'ability' => $ability,'abilitiesP' => $abilityPokemon]);
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pokemon/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PokemonRequest $request)
    {
        $input=$request->validated();
        $pokemon=new Pokemon($input);
        $pokemon -> image= $request -> file('file')->getClientOriginalName();
        if($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $target = '../public/assets/img/';
            $name = $file->getClientOriginalName();
            $file->move($target, $name);
 
        }
        
        $pokemon -> height = $request -> get ("height");
        $pokemon -> name = $request -> get ("name");
        $pokemon -> weight = $request -> get ("weight");
        try {
            $result=$pokemon->save();
        } catch(\Exception $e) {
            var_dump($e);
            exit;
        
        }
    
        return redirect(route('pokemon.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show(Pokemon $pokemon)
    {
        $ability= Ability::All();
        
        $abilityPokemon= AbilityPokemon::All();
        
        return view('pokemon/show')->with(['pokemon'=>$pokemon , 'ability' => $ability,'abilitiesP' => $abilityPokemon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokemon $pokemon)
    { 
        return view('pokemon/edit')->with(['pokemon'=>$pokemon]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(PokemonRequest $request, Pokemon $pokemon)
    {
        $input=$request->validated();
         try{
            $result=$pokemon->update($input);
        }catch(\Exception $e){
            $error=['nombre'=>'El nombre utilizado ya existe en otro pokemon.'];
            return redirect('pokemon/'. $pokemon->id . '/edit') ->withErrors($error) -> withInput();
        }
        return redirect(route('pokemon.index'))->with(['result'=>$result,'op'=>'update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemon $pokemon)
    {
         try{
             $pokemon->delete();
             $result=true;

        }catch(\Exception $e){
            $result=false;
        }
        return redirect(route('pokemon.index'))->with(['result'=>$result ,'op'=>'destroy']); 
    }
}
