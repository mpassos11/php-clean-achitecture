<?php


namespace Alura\Arquitetura\Academico\App\Aluno;


use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado;
use Alura\Arquitetura\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioAluno;
use Alura\Arquitetura\Academico\Dominio\PublicadorDeEvento;
use Alura\Arquitetura\Academico\Infra\Aluno\RespositorioAlunoMemoria;

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