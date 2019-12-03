<?php

namespace App\Http\Controllers;

use App\Ability;
use Illuminate\Http\Request;

use App\Http\Requests\AbilityRequest;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ability = Ability::paginate(7);
        return view('ability/abilities')->with(['abilities' => $ability]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('ability/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbilityRequest $request)
    {
        $input=$request->validated();
        $ability=new Ability($input);
        try {
            $result=$ability->save();
        } catch(\Exception $e) {
            var_dump($e);
            exit;
        }
    
        return redirect(route('ability.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function show(Ability $ability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function edit(Ability $ability)
    {
        return view('ability/edit')->with(['ability'=>$ability]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function update(AbilityRequest $request, Ability $ability)
    {
         $input=$request->validated();
         try{
            $result=$ability->update($input);
        }catch(\Exception $e){
            $error=['ability'=>'error ocurred'];
            return redirect('ability/'. $ability->id . '/edit') ->withErrors($error) -> withInput();
        }
        return redirect(route('ability.index'))->with(['result'=>$result,'op'=>'update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ability $ability)
    {
         try{
             $ability->id= 's' . $ability->id;
             $ability->ability='s' . $ability->ability;
             $ability->delete();
             $result=true;
         
        }catch(\Exception $e){
            $result=false;
        }
        return redirect(route('ability.index'))->with(['result'=>$result ,'op'=>'destroy']); 
    }
}
