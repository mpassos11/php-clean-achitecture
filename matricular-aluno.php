<?php

use Alura\Arquitetura\Academico\App\Aluno\MatricularAluno;
use Alura\Arquitetura\Academico\App\Aluno\MatricularAlunoDTO;
use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Alura\Arquitetura\Academico\Dominio\PublicadorDeEvento;
use Alura\Arquitetura\Academico\Infra\Aluno\RespositorioAlunoMemoria;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

$publicador = new PublicadorDeEvento();
$publicador->addOuvinte(new LogDeAlunoMatriculado());
$useCase = new MatricularAluno(new RespositorioAlunoMemoria(), $publicador);

$useCase->executa(new MatricularAlunoDTO($cpf, $nome, $email));
