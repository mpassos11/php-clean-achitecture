<?php


namespace Alura\Arquitetura\App;


use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\RepositorioAluno;
use Alura\Arquitetura\Infra\Aluno\RespositorioAlunoMemoria;

class MatricularAluno
{
	private RepositorioAluno $repositorioAluno;
	
	public function __construct(RepositorioAluno $repositorioAluno)
	{
		$this->repositorioAluno = $repositorioAluno;
	}
	
	public function executa(MatricularAlunoDTO $dados): void
	{
		$aluno = Aluno::comCpfNomeEmail($dados->cpfAluno, $dados->nomeAluno, $dados->emailAluno);
		$this->repositorioAluno = new RespositorioAlunoMemoria();
		$this->repositorioAluno->adicionar($aluno);
	}
}