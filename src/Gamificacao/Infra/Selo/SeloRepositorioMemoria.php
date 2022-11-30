<?php


namespace Alura\Arquitetura\Gamificacao\Infra\Selo;


use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioSelo;
use Alura\Arquitetura\Shared\Dominio\CPF;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\Selo;

class SeloRepositorioMemoria implements RepositorioSelo
{
	private array $selos = [];
	
	public function adiciona(Selo $selo): void
	{
		$this->selos[] = $selo;
	}
	
	public function selosDeAlunoComCpf(CPF $cpf)
	{
		return array_filter($this->selos, fn (Selo $selo) => $selo->cpfAluno() == $cpf);
	}
}