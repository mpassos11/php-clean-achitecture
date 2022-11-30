<?php


namespace Alura\Arquitetura\Gamificacao\Dominio\Selo;


use Alura\Arquitetura\Shared\Dominio\CPF;

interface RepositorioSelo
{
	public function adiciona(Selo $selo): void;
	
	public function selosDeAlunoComCpf(CPF $cpf);
}