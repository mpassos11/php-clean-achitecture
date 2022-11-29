<?php

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Infra\Aluno\RespositorioAlunoMemoria;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

$aluno = Aluno::comCpfNomeEmail($cpf, $nome, $email)->addTelefone($ddd, $numero);
$repositorio = new RespositorioAlunoMemoria();
$repositorio->adicionar($aluno);