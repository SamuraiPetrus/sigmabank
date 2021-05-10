<?php

class Conta
{
    private string $nomeTitular;
    private string $cpfTitular;
    private \DateTime $dataCriacao;
    private float $saldo;
    private bool $contaPremium;

    public function __construct(string $cpfTitular, string $nomeTitular)
    {
        $this->nomeTitular = $nomeTitular;
        $this->cpfTitular = $cpfTitular;
        $this->contaPremium = false;
        $this->dataCriacao = new \DateTime();
        $this->saldo = 0;
    }

    /**
     * Recupera o nome do titular.
     * @return string
     */
    public function recuperarNomeTitular(): string
    {
        return $this->nomeTitular;
    }

    /**
     * Recupera o CPF do titular.
     * @return string
     */
    public function recuperarCpfTitular(): string
    {
        return $this->cpfTitular;
    }

    /**
     * Ativa os privilégios da conta premium.
     * @param bool $contaPremium
     * @return void
     */
    public function definirContaPremium(bool $contaPremium): void
    {
        $this->contaPremium = $contaPremium;   
    }

    /**
     * Recupera data de criação da conta.
     * @return string
     */
    public function recuperarDataCriacao(): string
    {
        return $this->dataCriacao->format('d/m/Y');
    }

    /**
     * Recupera o saldo da conta.
     * @return float
     */
    public function recuperarSaldo(): float
    {
        return $this->saldo;
    }

    /**
     * Efetua um saque na conta.
     * @param float $valor
     * @return void
     */
    public function sacar(float $valor): void
    {
        if ($this->saldo < $valor) {
            echo 'Saldo Insuficiente!';
            return;
        }

        $this->saldo -= $valor;
    }

    /**
     * Efetua um depósito na conta.
     * @param float $valor
     * @return void
     */
    public function depositar(float $valor): void
    {
        if ($valor <= 0) {
            echo 'Deposite uma quantia válida!';
            return;
        }

        if ($this->verificarLimiteSaldoAtingido($valor)) {
            echo 'Atualize para o nível premium para poder armazenar mais do que R$5000 em saldo.' . PHP_EOL;
            return;
        }

        $this->saldo += $valor;
    }

    /**
     * Solicita um empréstimo ao banco destinado a conta.
     * @param float $valor
     * @return void
     */
    public function solicitarEmprestimo(float $valor): void
    {
        $dataPermitida = new \DateTime();
        $dataPermitida->add(DateInterval::createFromDateString('2 years'));

        if ($this->dataCriacao < $dataPermitida || $this->saldo < 5000) {
            echo 'Sua conta não se qualifica para empréstimo.';
            return;
        }

        $this->depositar($valor);
    }

    /**
     * Verifica se o limite de saldo da conta foi atingido.
     * @param float $valor
     * @return bool
     */
    private function verificarLimiteSaldoAtingido(float $valor): bool
    {
        if ($this->saldo >= 5000 || $valor > 5000 || $this->saldo + $valor > 5000) {
            if ($this->contaPremium) {
                return false;
            }

            return true;
        }

        return false;
    }
}