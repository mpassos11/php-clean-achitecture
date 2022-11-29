<?php

namespace Alura\Arquitetura\Testes\Dominio\Aluno;

use Alura\Arquitetura\Dominio\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
	public function testEmailNoFormatoInvalidadoNaoDevePoderExistir()
	{
		$this->expectException(\InvalidArgumentException::class);
		new Email('email invalido');
	}
	
	public function testEmailDevePoderSerRepresentadoComoString()
	{
		$email = new Email('endereco@example.com');
		$this->assertSame('endereco@example.com', (string) $email);
	}
}