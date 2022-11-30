<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioAluno;
use Alura\Arquitetura\Academico\Dominio\CPF;

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
		$sql = 'SELECT cpf, nome, email, ddd, numero as numero_telefone
				FROM alunos
				LEFT JOIN telefones ON telefones.cpf_aluno = alunos.cpf
				WHERE alunos.cpf = ?';
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(1, (string) $cpf);
		$stmt->execute();
		
		$dadosAluno = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		if (count($dadosAluno) == 0) {
			throw new AlunoNaoEncontrado($cpf);
		}
		
		return $this->mapearAluno($dadosAluno);
	}
	
	public function buscarTodos(): array
	{
		$sql = 'SELECT cpf, nome, email, ddd, numero as numero_telefone
				FROM alunos
				LEFT JOIN telefones ON telefones.cpf_aluno = alunos.cpf';
		$stmt = $this->conexao->prepare($sql);
		
		$listaDadosAlunos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		
		$alunos = [];
		foreach ($listaDadosAlunos as $dadosAluno) {
			if (!array_key_exists($dadosAluno['cpf'], $alunos)) {
				$alunos[$dadosAluno['cpf']] = Aluno::comCpfNomeEmail(
					$dadosAluno['cpf'],
					$dadosAluno['nome'],
					$dadosAluno['email']
				);
			}
			
			if ($dadosAluno['ddd'] !== null && $dadosAluno['numero_telefone'] !== null) {
				$alunos[$dadosAluno['cpf']]->addTelefone($dadosAluno['ddd'], $dadosAluno['numero_telefone']);
			}
		}
		
		return array_values($alunos);
	}
	
	private function mapearAluno(array $dadosAluno): Aluno
	{
		$primeiraLinha = $dadosAluno[0];
		$aluno = Aluno::comCpfNomeEmail($primeiraLinha['cpf'], $primeiraLinha['nome'], $primeiraLinha['email']);
		$telefones = array_filter(
			$dadosAluno,
			fn ($linha) => $linha['ddd'] !== null && $linha['numero_telefone'] !== null
		);
		foreach ($telefones as $telefone) {
			$aluno->addTelefone($telefone['ddd'], $telefone['numero_telefone']);
		}
		
		return $aluno;
	}
}