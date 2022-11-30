<?php


namespace Alura\Arquitetura\Academico\Dominio\Aluno;


use Alura\Arquitetura\Shared\Dominio\CPF;
use Alura\Arquitetura\Academico\Dominio\Evento;

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