<?php

namespace Alura\Arquitetura\App\Indicacao\EnviarEmailIndicacao;

use Alura\Arquitetura\Dominio\Aluno\Aluno;

interface EnviarEmailIndicacao
{
	public function enviaPara(Aluno $aluno): void;
}