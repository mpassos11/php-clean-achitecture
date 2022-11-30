<?php

namespace Alura\Arquitetura\Academico\App\Indicacao\EnviarEmailIndicacao;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;

interface EnviarEmailIndicacao
{
	public function enviaPara(Aluno $aluno): void;
}