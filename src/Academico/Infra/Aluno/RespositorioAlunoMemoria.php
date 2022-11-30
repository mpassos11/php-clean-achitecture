<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioAluno;
use Alura\Arquitetura\Academico\Dominio\CPF;

class RespositorioAlunoMemoria implements RepositorioAluno
{
	
	/** @var Aluno[] */
	private array $alunos;
	
	public function adicionar(Aluno $aluno): void
	{
		$this->alunos[] = $aluno;
	}
	
	public function buscarPorCpf(CPF $cpf): Aluno
	{
		$alunosFiltrados = array_filter(
			$this->alunos,
			fn (Aluno $aluno) => $aluno->cpf() == $cpf
		);
		
		if (count($alunosFiltrados) == 0) {
			throw new AlunoNaoEncontrado($cpf);
		}
		
		if (count($alunosFiltrados) > 1) {
			throw new Exception();
		}
		
		return $alunosFiltrados[0];
	}
	
	public function buscarTodos(): array
	{
		return $this->alunos;
	}
}