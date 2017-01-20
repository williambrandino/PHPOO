<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cliente\App;

use Cliente\App\Cliente as ClientePessoa;
/**
 * Description of ClientePF
 *
 * @author Brandy
 */
class ClientePF extends ClientePessoa
{
    
    public function pontuacaoCliente($id)
    {
        switch ($id){
            case $id < 5:
                $pontuacao = "*";
                break;
            case $id >= 5:
                $pontuacao = "**";
                break;
        }
        return $pontuacao;
    }

    public function getEnderecoCobranca()
    {
        return "O Mesmo";
    }
}