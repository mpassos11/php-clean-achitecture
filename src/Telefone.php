<?php


namespace Alura\Arquitetura;


class Telefone
{
	private string $ddd;
	private string $numero;
	
	public function __construct(string $ddd, string $numero)
	{
		$this->ddd = $ddd;
		$this->numero = $numero;
	}
}