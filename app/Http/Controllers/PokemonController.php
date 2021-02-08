<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;

class PokemonController extends Controller
{
    public function index(){
        return view('pokemon.search');
    }

    public function search(Request $request){

        //Validação se o campo está vazio
        $validator = Validator::make($request->all(), [
            'search' => 'required'
        ], $messages = ['required' => 'O campo de busca não pode estar vazio.']);

        //Se falhar redireciona para a rota de busca, com os erros
        if ($validator->fails()) {
            return redirect()
                    ->route('pokemon')
                    ->withErrors($validator)
                    ->withInput();
        }

        //Colocando em caixa baixa
        $name =  strtolower($request->search);
        //endereço da API
        $link = "https://pokeapi.co/api/v2/pokemon/$name";

        $ch = curl_init($link);
        //Definindo os parametros de retorno e verificação de ssl
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //Executa o curl
        $response = curl_exec($ch);
        //fecha o curl
        curl_close($ch);

        $data = json_decode($response);

        //Validação de retorno da API
        $validator->after(function ($validator) use ($data){
            if ($data == null) {
                $validator->errors()->add(
                    'search', 'O pokémon digitado não é valido!'
                );
            }
        });

        //Verifica se há erros
        if ($validator->fails()) {
            return redirect()
                    ->route('pokemon')
                    ->withErrors($validator)
                    ->withInput();
        }

        //Se estiver tudo ok, irá retornar os resultados
        return view('pokemon.show', ['data' => $data]);
    }
}
