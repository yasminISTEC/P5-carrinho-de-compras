<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

 require_once __DIR__ . '/../src/ValidadorPasse.php';

/**
 * Exercicio P5.3  ·  Ciclo TDD  ·  Validador de palavra-passe
 *
 * Aqui vais trabalhar ao contrario do habitual: escreves o TESTE PRIMEIRO,
 * ve-lo falhar (vermelho), depois escreves o codigo para ele passar (verde).
 *
 * Uma palavra-passe e valida quando cumpre, ao mesmo tempo:
 *   
 *   
 *   
 *
 * Como fazer, um requisito de cada vez:
 *   
 *   b) Corre o php phpunit e confirma que FALHA (ainda nao ha codigo).
 *   c) Cria a classe ValidadorPasse com o metodo valida() e faz o teste passar.
 *   d) So depois avanca para o requisito 2, e por fim o requisito 3.
 *
 * Confirma sempre a conta a mao antes de escrever o resultado esperado.
 */
class ValidadorPasseTest extends TestCase
{
    // TODO P5.3: comeca aqui pelo requisito 1 (minimo de 8 caracteres).
    //
     public function testPasseCurtaEhInvalida(): void
     {
         $validador = new ValidadorPasse();
         $this->assertFalse($validador->valida('Ab1'));
     }
    
    public function testPasseComOitoCaracteresEhValida(): void
    {
        $validador = new ValidadorPasse();
        $this->assertTrue($validador->valida('Ab1defgh'));
    }

    public function testPasseSemMaiusculaEhInvalida(): void
    {
        $validador = new ValidadorPasse();
        $this->assertFalse($validador->valida('ab1defgh'));
    }

    public function testPasseSemDigitoEhInvalida(): void
    {
        $validador = new ValidadorPasse();
        $this->assertFalse($validador->valida('Abcdefgh'));
    
    }

    
}
