<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cliente;

/**
 * Description of ClienteAbstract
 *
 * @author Brandy
 */
abstract class ClienteAbstract
{
    protected $id;
    protected $nome;
    protected $endereco;
    protected $documento;

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    public function getDocumento()
    {
        return $this->documento;
    }

    public function setDocumento($documento)
    {
        $this->documento = $documento;
        return $this;
    }

    public function tipoPessoa($documento)
    {

        switch (strlen($documento)) {
            case 11:
                $tipoPessoa = "Física";
                break;
            case 14:
                $tipoPessoa = "Jurídica";
                break;
        }

        return $tipoPessoa;
    }

    abstract public function pontuacaoCliente($id);
    abstract public function getEnderecoCobranca();
}