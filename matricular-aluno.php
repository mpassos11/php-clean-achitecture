<?php

use Alura\Arquitetura\Academico\App\Aluno\MatricularAluno;
use Alura\Arquitetura\Academico\App\Aluno\MatricularAlunoDTO;
use Alura\Arquitetura\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Alura\Arquitetura\Academico\Infra\Aluno\RespositorioAlunoMemoria;
use Alura\Arquitetura\Gamificacao\Infra\Selo\SeloRepositorioMemoria;
use Alura\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

$publicador = new PublicadorDeEvento();
$publicador->addOuvinte(new LogDeAlunoMatriculado());
$publicador->addOuvinte(new GeraSeloNovato(new SeloRepositorioMemoria()));
$useCase = new MatricularAluno(new RespositorioAlunoMemoria(), $publicador);

$useCase->executa(new MatricularAlunoDTO($cpf, $nome, $email));
