<?php


namespace Alura\Arquitetura\Dominio\Aluno;


interface CifradorSenha
{
	public function cifrar(string $senha): string;
	public function verificar(string $senhaEmTexto, string $senhaCifrada): bool;
}