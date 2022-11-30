<?php


namespace Alura\Arquitetura\Academico\Testes\Aplicacao\Aluno;


use Alura\Arquitetura\Academico\App\MatricularAluno;
use Alura\Arquitetura\Academico\App\MatricularAlunoDTO;
use Alura\Arquitetura\Academico\Dominio\CPF;
use Alura\Arquitetura\Academico\Infra\Aluno\RespositorioAlunoMemoria;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
	public function testAlunoDeveSerAdicionadoAoRepositorio()
	{
		$matriculaAluno = new MatricularAlunoDTO('123.456.789-10', 'Teste', 'mail@mail.com');
		
		$repositorioMemoria = new RespositorioAlunoMemoria();
		$useCase = new MatricularAluno($repositorioMemoria);
		$useCase->executa($matriculaAluno);
		
		$aluno = $repositorioMemoria->buscarPorCpf(new CPF('123.456.789-10'));
		
		$this->assertSame('Teste', (string) $aluno->nome());
		$this->assertSame('mail@mail.com', (string) $aluno->email());
		$this->assertEmpty($aluno->telefones());
	}
}