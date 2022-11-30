<?php


namespace Alura\Arquitetura\Dominio\Aluno;


use Alura\Arquitetura\Dominio\CPF;
use Alura\Arquitetura\Dominio\Evento;

class AlunoMatriculado implements Evento
{
	
	private \DateTimeImmutable $momento;
	private CPF $cpfAluno;
	
	public function __construct(CPF $cpfAluno)
	{
		$this->cpfAluno = $cpfAluno;
		$this->momento = new \DateTimeImmutable();
	}
	
	public function cpfAluno(): CPF
	{
		return $this->cpfAluno;
	}
	
	public function momento(): \DateTimeImmutable
	{
		return $this->momento;
	}
}