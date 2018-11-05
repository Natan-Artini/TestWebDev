<?php

/**
 * Contem todas as ações dos contatos, listar, adicionar, editar e excluir
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContatoModel;

class Contato extends Controller
{
    /**
     * Retorna todos os contatos para a view index que exibe em tela
     */
    public function index(){
        $contatos = ContatoModel::get();
        return view('contatos.index', compact('contatos'));
    }

    /**
     * Usada quando é acionado o botão enviar do cadastro
     * Criado uma variavel data que pega as informações que vem na request
     * Com essas informações é adicionado ao banco de dados
     */    
    public function add(Request $request){
        $data = $request->all();

        $contatos = ContatoModel::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'telefone' => $data['telefone'],
            'cep' => $data['cep'],
        ]);

        return json_encode($contatos);

        /**
         * Existe a possibilidade de fazer a validação aqui
         * $request->validade([
         *      'name' => 'required',
         * ]);
         * 
         * Pode adicionar ao banco
         * ContatoModel::creat($request->all());
         * 
         * O redirecionamento
         * return redirect()->route('contatos.index');
         */
    }
    

    /**
     * Usado apenas para redirecionar para a pagina de edição
     * Encontra o contato especifico e manda como parametro
     */
    public function viewEdit($id){
        $contato = ContatoModel::find($id);
        return view('contatos.add_edit', compact('contato'));
    }

    /**
     * Faz a atualização do cadastro, recebe os dados por request
     * e faz update no id que foi alterado
    */
    public function edit(Request $request){

        $data = $request->all();

        $contatos = ContatoModel::where('id', $data['id'])
                                ->update([
                                'name' => $data['name'],
                                'email' => $data['email'],
                                'telefone' => $data['telefone'],
                                'cep' => $data['cep'],
                                ]);
            
        return json_encode($contatos);
    }
    
    /**
     * Faz a exclusão do cadastro, recebe por parametro o ID do contato
     * encontra no banco e faz o delet, direciona novamente para a tela de contatos
    */
    public function exclude($id){
        $contato = ContatoModel::find($id);
        $contato->delete();
        return redirect('contatos');
    }
}