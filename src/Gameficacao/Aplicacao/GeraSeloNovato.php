<?php


use Alura\Arquitetura\Academico\Dominio\Selo\RepositorioSelo;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\Selo;
use Alura\Arquitetura\Shared\Dominio\Evento\Evento;
use Alura\Arquitetura\Shared\Dominio\Evento\OuvinteDeEvento;

class GeraSeloNovato extends OuvinteDeEvento
{
	private RepositorioSelo $repositorioSelo;
	
	public function __construct(RepositorioSelo $repositorioSelo)
	{
		$this->repositorioSelo = $repositorioSelo;
	}
	
	public function sabeProcessar(Evento $evento): bool
	{
		return get_class($evento) === 'Alura\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado';
	}
	
	public function reageAo(Evento $evento): void
	{
		$dadosAluno = $evento->jsonSerialize();
		$cpf = $dadosAluno['cpfAluno'];
		
		$selo = new Selo($cpf, 'Novato');
		$this->repositorioSelo->adiciona($selo);
	}
}