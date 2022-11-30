<?php


namespace Alura\Arquitetura\Gamificacao\Aplicacao\BuscarSelosUsuario;


use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioSelo;
use Alura\Arquitetura\Shared\Dominio\CPF;

class BuscarSelosUsuario
{
	private RepositorioSelo $repositorioSelo;
	
	public function __construct(RepositorioSelo $repositorioSelo)
	{
		$this->repositorioSelo = $repositorioSelo;
	}
	
	public function executa(BuscarSelosUsuarioDTO $dados)
	{
		$cpf = new CPF($dados->cpfAluno);
		return $this->repositorioSelo->selosDeAlunoComCpf($cpf);
	}
}