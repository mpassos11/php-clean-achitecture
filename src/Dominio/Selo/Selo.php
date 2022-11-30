<?php

namespace Alura\Arquitetura\Dominio\Selo;

use Alura\Arquitetura\Dominio\CPF;

class Selo
{
	private CPF $cpfAluno;
	private string $nome;
	
	public function __construct(CPF $cpfAluno, string $nome)
	{
		$this->cpfAluno = $cpfAluno;
		$this->nome = $nome;
	}
	
	public function cpfAluno(): CPF
	{
		return $this->cpfAluno;
	}
	
	public function __toString(): string
	{
		return $this->nome;
	}
}