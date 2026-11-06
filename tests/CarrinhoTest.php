<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Carrinho.php';

/**
 * Testes da classe Carrinho.
 */
class CarrinhoTest extends TestCase
{
    private Carrinho $carrinho;

    protected function setUp(): void
    {
        $this->carrinho = new Carrinho();
    }

    public function testTotalVazioEhZero(): void
    {
        $this->assertSame(0, $this->carrinho->total());
    }

    public function testTotalComUmArtigo()
    {
        $this->carrinho->adicionar('A', 10, 2);

        $this->assertSame(20, $this->carrinho->total());
    }

    public function testTotalComDoisArtigos(): void
    {
        $this->carrinho->adicionar('A', 10, 2);
        $this->carrinho->adicionar('B', 5, 1);

        $this->assertSame(25, $this->carrinho->total());
    }

    public function testTotalComTresArtigos(): void
    {
        $this->carrinho->adicionar('A', 10, 2);
        $this->carrinho->adicionar('B', 5, 1);
        $this->carrinho->adicionar('C', 3, 4);

        $this->assertSame(37, $this->carrinho->total());
    }

    public function testNumeroDeArtigosNoCarrinhoVazio(): void
    {
        $this->assertSame(0, $this->carrinho->numeroDeArtigos());
    }

    public function testNumeroDeArtigosComVariosArtigos(): void
    {
        $this->carrinho->adicionar('A', 10, 2);
        $this->carrinho->adicionar('B', 5, 1);
        $this->carrinho->adicionar('C', 3, 4);

        $this->assertSame(3, $this->carrinho->numeroDeArtigos());
    }

    public function testCarrinhoNovoEstaVazio(): void
    {
        $this->assertSame(true, $this->carrinho->vazio());
    }

    public function testCarrinhoComArtigoNaoEstaVazio(): void
    {
        $this->carrinho->adicionar('A', 10, 2);

        $this->assertSame(false, $this->carrinho->vazio());
    }

    public function testQuantidadeZeroLevantaErro(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('A quantidade tem de estar entre 1 e 20.');

        $this->carrinho->adicionar('A', 10, 0);
    }

    public function testQuantidadeAcimaDeVinteLevantaErro(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->carrinho->adicionar('A', 10, 21);
    }

    public function testPrecoNegativoLevantaErro(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->carrinho->adicionar('A', -1, 1);
    }
}
