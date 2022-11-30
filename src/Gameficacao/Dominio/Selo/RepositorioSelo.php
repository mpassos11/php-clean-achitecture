<?php


namespace Alura\Arquitetura\Academico\Dominio\Selo;


use Alura\Arquitetura\Shared\Dominio\CPF;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\Selo;

interface RepositorioSelo
{
	public function adiciona(Selo $selo): void;
	
	public function selosDeAlunoComCpf(CPF $cpf);
}