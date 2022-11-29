<?php

namespace Alura\Arquitetura\Infra\Aluno;

use Alura\Arquitetura\Dominio\CPF;

class AlunoNaoEncontrado extends \DomainException
{
	
	/**
	 * AlunoNaoEncontrado constructor.
	 * @param CPF $cpf
	 */
	public function __construct(CPF $cpf)
	{
		parent::__construct("Aluno com o CPF '{$cpf}' não encontrado");
	}
}