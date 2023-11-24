<?php

class Contato
{
    private $email;
    private $assuntoEmail;
    private $nomeEmail;
    private $motivoEmail;
    private $mensagemEmail;
    private $receberResposta;

    public function __construct($email, $assuntoEmail, $nomeEmail, $motivoEmail, $mensagemEmail)
    {
        $this->email = $email;
        $this->assuntoEmail = $assuntoEmail;
        $this->nomeEmail = $nomeEmail;
        $this->motivoEmail = $motivoEmail;
        $this->mensagemEmail = $mensagemEmail;
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
        return $this->assuntoEmail;
    }

    public function setAssunto($assuntoEmail)
    {
        $this->assuntoEmail = $assuntoEmail;
    }

    public function getNome()
    {
        return $this->nomeEmail;
    }

    public function setNome($nomeEmail)
    {
        $this->nomeEmail = $nomeEmail;
    }

    public function getMotivo()
    {
        return $this->motivoEmail;
    }

    public function setMotivo($motivoEmail)
    {
        $this->motivoEmail = $motivoEmail;
    }

    public function getMensagem()
    {
        return $this->mensagemEmail;
    }

    public function setMensagem($mensagemEmail)
    {
        $this->mensagemEmail = $mensagemEmail;
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
