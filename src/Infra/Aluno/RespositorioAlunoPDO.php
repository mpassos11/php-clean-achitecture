<?php


use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\RepositorioAluno;
use Alura\Arquitetura\Dominio\CPF;

class RespositorioAlunoPDO implements RepositorioAluno
{
	
	private PDO $conexao;
	
	public function __construct(\PDO $conexao)
	{
		$this->conexao = $conexao;
	}
	
	public function adicionar(Aluno $aluno): void
	{
		$sql = "INSERT INTO alunos VALUES (:cpf, :nome, :email);";
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue('cpf', $aluno->cpf());
		$stmt->bindValue('nome', $aluno->nome());
		$stmt->bindValue('email', $aluno->email());
		$stmt->execute();
		
		$sql = 'INSERT INTO telefones VALUES (:ddd, :numero, :cpf_aluno);';
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue('cpf_aluno', $aluno->cpf());
		
		/** @var Telefone $telefone */
		foreach ($aluno->telefones() as $telefone) {
			$stmt->bindValue('ddd', $telefone->ddd());
			$stmt->bindValue('numero', $telefone->numero());
			$stmt->execute();
		}
	}
	
	public function buscarPorCpf(CPF $cpf): Aluno
	{
		// TODO: Implement buscarPorCpf() method.
	}
	
	public function buscarTodos(): array
	{
		// TODO: Implement buscarTodos() method.
	}
}