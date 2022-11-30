<?php


namespace Alura\Arquitetura\Academico\Dominio\Selo;


use Alura\Arquitetura\Academico\Dominio\CPF;

interface RepositorioSelo
{
	public function adiciona(Selo $selo): void;
	
	public function selosDeAlunoComCpf(CPF $cpf);
}