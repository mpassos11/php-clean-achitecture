<?php


namespace Alura\Arquitetura\Shared\Dominio\Evento;


class PublicadorDeEvento
{
	private array $ouvintes = [];
	
	public function addOuvinte(OuvinteDeEvento $ouvinte): void
	{
		$this->ouvintes[] = $ouvinte;
	}
	
	public function publicar(Evento $evento)
	{
		/** @var OuvinteDeEvento $ouvinte*/
		foreach ($this->ouvintes as $ouvinte) {
			$ouvinte->processa($evento);
		}
	}
}