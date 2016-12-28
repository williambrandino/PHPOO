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
    public $id;
    public $nome;
    public $documento;
    public $endereco;

    public function __construct($id,$nome, $documento, $endereco)
    {
        $this->id        = $id;
        $this->nome      = $nome;
        $this->documento = $documento;
        $this->endereco  = $endereco;
    }

    function getId()
    {
        return $this->id;
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