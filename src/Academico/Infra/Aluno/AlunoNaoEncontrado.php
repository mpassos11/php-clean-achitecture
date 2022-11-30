<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Shared\Dominio\CPF;

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