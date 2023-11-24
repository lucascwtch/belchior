<?php

class Contato
{
    private $email;
    private $assunto;
    private $nome;
    private $motivo;
    private $mensagem;
    private $receberResposta;

    public function __construct($email, $assunto, $nome, $motivo, $mensagem)
    {
        $this->email = $email;
        $this->assunto = $assunto;
        $this->nome = $nome;
        $this->motivo = $motivo;
        $this->mensagem = $mensagem;
        //$this->receberResposta = $receberResposta;
    }

    // Métodos getters e setters
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAssunto()
    {
        return $this->assunto;
    }

    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getMotivo()
    {
        return $this->motivo;
    }

    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    }

    public function getMensagem()
    {
        return $this->mensagem;
    }

    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    public function receberResposta()
    {
        return $this->receberResposta;
    }

    public function setReceberResposta($receberResposta)
    {
        $this->receberResposta = $receberResposta;
    }
}
