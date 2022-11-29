<?php


use Alura\Arquitetura\Dominio\Aluno\CifradorSenha;

class CifradorSenhaMD5 implements CifradorSenha
{
	
	public function cifrar(string $senha): string
	{
		return md5($senha);
	}
	
	public function verificar(string $senhaEmTexto, string $senhaCifrada): bool
	{
		return md5($senhaEmTexto) === $senhaCifrada;
	}
}