<?php


namespace Alura\Arquitetura\App\Aluno;


use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoMatriculado;
use Alura\Arquitetura\Dominio\Aluno\LogDeAlunoMatriculado;
use Alura\Arquitetura\Dominio\Aluno\RepositorioAluno;
use Alura\Arquitetura\Dominio\PublicadorDeEvento;
use Alura\Arquitetura\Infra\Aluno\RespositorioAlunoMemoria;

class MatricularAluno
{
	private RepositorioAluno $repositorioAluno;
	private PublicadorDeEvento $publicador;
	
	public function __construct(RepositorioAluno $repositorioAluno, PublicadorDeEvento $publicador)
	{
		$this->repositorioAluno = $repositorioAluno;
		$this->publicador = $publicador;
	}
	
	public function executa(MatricularAlunoDTO $dados): void
	{
		$aluno = Aluno::comCpfNomeEmail($dados->cpfAluno, $dados->nomeAluno, $dados->emailAluno);
		$this->repositorioAluno->adicionar($aluno);
		
		$evento = new AlunoMatriculado($aluno->cpf());
		$this->publicador->publicar($evento);
	}
}