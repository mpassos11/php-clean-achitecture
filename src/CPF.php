<?php


namespace Alura\Arquitetura;


class CPF
{
	private string $numero;
	
	public function __construct(string $numero)
	{
		$this->setNumero($numero);
	}
	
	private function setNumero(string $numero): void
	{
		$opcoes = [
			'options' => [
				'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
			]
		];
		
		if (filter_var($numero, FILTER_VALIDATE_REGEXP, $opcoes) === false) {
			throw new \InvalidArgumentException('CPF no formato inv�lido');
		}
		
		$this->numero = $numero;
	}
	
	public function __toString(): string
	{
		return $this->numero;
	}
}