<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientePJ
 *
 * @author Brandy
 */
class ClientePJ extends Cliente implements ClienteInterface
{

    private $cobranca;
    public function pontuacaoCliente($id)
    {
        switch ($id){
            case $id < 5:
                $pontuacao = "***";
                break;
            case $id >= 5:
                $pontuacao = "*****";
                break;
        }
        return $pontuacao;
    }
    public function setCobranca($cobranca)
    {
        $this->cobranca = $cobranca;
        return $this;
    }

        public function getEnderecoCobranca()
    {
        return $this->cobranca;
    }
}