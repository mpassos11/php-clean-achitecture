<?php


namespace Dominio\Aluno;


use Alura\Arquitetura\Dominio\Aluno\Aluno;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
	public function testAlunoSoPodeTerNoMaximo2Telefones()
	{
		$this->expectException(\DomainException::class);
		$this->expectDeprecationMessage('Aluno já tem 2 telefones e por isso não pode adicionar outro telefone');
		Aluno::comCpfNomeEmail('123.456.789-10', 'Matheus', 'email@email.com')
			->addTelefone('11', '960734956')
			->addTelefone('11', '995586507')
			->addTelefone('11', '954945445');
	}
}