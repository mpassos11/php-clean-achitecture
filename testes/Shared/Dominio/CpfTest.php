<?php

namespace Alura\Arquitetura\Testes\Shared\Dominio;


use Alura\Arquitetura\Shared\Dominio\CPF;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
	public function testCpfComNumeroNoFormatoInvalidoNaoDevePoderExistir()
	{
		$this->expectException(\InvalidArgumentException::class);
		new CPF('12345678910');
	}
	
	public function testCpfDevePoderSerRepresentadoComoString()
	{
		$cpf = new CPF('123.456.789-10');
		$this->assertSame('123.456.789-10', (string) $cpf);
	}
}