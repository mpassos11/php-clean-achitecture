<?php

namespace Alura\Arquitetura\Infra\Aluno;

use Alura\Arquitetura\Dominio\Aluno\CifradorSenha;

class CifradorSenhaPHP implements CifradorSenha
{
	
	public function cifrar(string $senha): string
	{
		return password_hash($senha, PASSWORD_ARGON2ID);
	}
	
	public function verificar(string $senhaEmTexto, string $senhaCifrada): bool
	{
		return password_verify($senhaEmTexto, $senhaCifrada);
	}
}