<?php


use Alura\Arquitetura\Dominio\Aluno\Telefone;
use PHPUnit\Framework\TestCase;

class TelefoneTest extends TestCase
{
	public function testTelefoneDevePoderSerRepresentadoComoString()
	{
		$telefone = new Telefone('11', '960734956');
		$this->assertSame('(11) 960734956', (string) $telefone);
	}
	
	public function testTelefoneComDddInvalidoNaoDeveExistir()
	{
		$this->expectException(\InvalidArgumentException::class);
		$this->expectDeprecationMessage('DDD inv�lido');
		new Telefone('ddd', '960734956');
	}
	
	public function testTelefoneComNumeroInvalidoNaoDeveExistir()
	{
		$this->expectException(\InvalidArgumentException::class);
		$this->expectDeprecationMessage('N�mero de telefone inv�lido');
		new Telefone('11', 'numero123');
	}
}