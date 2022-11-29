<?php


namespace Alura\Arquitetura;


class Aluno
{
	private CPF $cpf;
	private string $nome;
	private Email $email;
	
	/** @var Telefone[] */
	private array $telefones;
	
	public function addTelefone(string $ddd, string $numero) : void
	{
		$this->telefones[] = new Telefone($ddd, $numero);
	}
}