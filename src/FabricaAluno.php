<?php


namespace Alura\Arquitetura;


class FabricaAluno
{
	private Aluno $aluno;
	
	public function comCpfEmailNome(string $numeroCpf, string $email, string $nome): self
	{
		$this->aluno = new Aluno(new CPF($numeroCpf), $nome, new Email($email));
		return $this;
	}
	
	public function addTelefone(string $ddd, string $numero): self
	{
		$this->aluno->addTelefone($ddd, $numero);
		return $this;
	}
}