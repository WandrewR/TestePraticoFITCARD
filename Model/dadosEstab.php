<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estabelecimentos
 *
 * @author Wandr
 */
class dadosEstab
{

    public function tirarMascara($campo)
    {
        $pontos = array(
            "/",
            ".",
            "-"
        );
        $limpo = str_replace($pontos, "", $campo);
        return $limpo;
    }

    public function modDataSQL($campo)
    {
        $limpo = str_replace("/", "", $campo);

        $ano = substr($limpo, 4, 4);
        $mes = substr($limpo, 2, 2);
        $dia = substr($limpo, 0, 2);

        return $ano . "-" . $mes . "-" . $dia;
    }

    public function modDataView($campo)
    {
        $limpo = str_replace("-", "", $campo);

        $ano = substr($limpo, 0, 4);
        $mes = substr($limpo, 4, 2);
        $dia = substr($limpo, 6, 2);

        return $dia . "/" . $mes . "/" . $ano;
    }

    public function modAgenciaView($campo)
    {
        $agencia1 = substr($campo, 0, 3);
        $agencia2 = substr($campo, 3, 1);

        return $agencia1 . "-" . $agencia2;
    }

    public function modContaView($campo)
    {
        $conta1 = substr($campo, 0, 2);
        $conta2 = substr($campo, 2, 3);
        $conta3 = substr($campo, 5, 1);

        return $conta1 . "." . $conta2 . "-" . $conta3;
    }

    public function modCnpjView($campo)
    {
        $um = substr($campo, 0, 2);
        $dois = substr($campo, 2, 3);
        $tres = substr($campo, 5, 3);
        $quatro = substr($campo, 8, 4);
        $cinco = substr($campo, 12, 2);

        return $um . "." . $dois . "." . $tres . "/" . $quatro . "-" . $cinco;
    }

    public function alteraNull($campo)
    {
        $pontos = array(
            ""
        );
        $limpo = str_replace($pontos, "", $campo);
        return $limpo;
    }

    public function alteraNullC($campo)
    {
        $pontos = array(
            ""
        );
        $limpo = str_replace($pontos, "0", $campo);
        return $limpo;
    }

    public function verificar($dados)
    {
        if (empty($dados['RazaoSocial'])) {
            $dados['RazaoSocial'] = "Dado não Informado";
        }
        if (empty($dados['NomeFantasia'])) {
            $dados['NomeFantasia'] = "Dado não Informado";
        }
        if (empty($dados['CNPJ'])) {
            $dados['CNPJ'] = "Dado não Informado";
        } else {
            $dados['CNPJ'] = $this->modCnpjView($dados['CNPJ']);
        }
        if (empty($dados['Email'])) {
            $dados['Email'] = "Dado não Informado";
        }
        if (empty($dados['Endereco'])) {
            $dados['Endereco'] = "Dado não Informado";
        }
        if (empty($dados['Cidade'])) {
            $dados['Cidade'] = "Dado não Informado";
        }
        if (empty($dados['Estado'])) {
            $dados['Estado'] = "Dado não Informado";
        }
        if (empty($dados['Telefone'])) {
            $dados['Telefone'] = "Dado não Informado";
        }

        if ($dados['DataCadastro'] === "0000-00-00") {
            $dados['DataCadastro'] = "Dado não Informado";
        } else {
            $dados['DataCadastro'] = $this->modDataView($dados['DataCadastro']);
        }

        if ($dados['nomecateg'] === "null") {
            $dados['nomecateg'] = "Dado não Informado";
        }

        if (empty($dados['Status'])) {
            $dados['Status'] = "Dado não Informado";
        }
        if ($dados['Agencia'] == 0000) {
            $dados['Agencia'] = "Dado não Informado";
        } else {
            $dados['Agencia'] = $this->modAgenciaView($dados['Agencia']);
        }
        if ($dados['Conta'] == 000000) {
            $dados['Conta'] = "Dado não Informado";
        } else {
            $dados['Conta'] = $this->modContaView($dados['Conta']);
        }

        return $dados;
    }
}
