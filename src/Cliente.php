<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author Brandy
 */
class Cliente
{
    public $nome;
    public $documento;
    public $endereco;

    public function __construct($nome, $documento, $endereco)
    {
        $this->nome      = $nome;
        $this->documento = $documento;
        $this->endereco  = $endereco;
    }

    function getNome()
    {
        return $this->nome;
    }

    function getDocumento()
    {
        return $this->documento;
    }

    function getEndereco()
    {
        return $this->endereco;
    }
}