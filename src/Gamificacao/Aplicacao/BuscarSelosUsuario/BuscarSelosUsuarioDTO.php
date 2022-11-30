<?php


namespace Alura\Arquitetura\Gamificacao\Aplicacao\BuscarSelosUsuario;


class BuscarSelosUsuarioDTO
{
	public string $cpfAluno;
	
	public function __construct(string $cpfAluno)
	{
		$this->cpfAluno = $cpfAluno;
	}
}