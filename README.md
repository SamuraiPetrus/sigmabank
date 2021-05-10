# Sigma Bank

Repositório de estudos em orientação a objetos PHP. Simula superficialmente um sistema de contas bancárias.

## Regras de negócio

- Uma conta não pode ser criada sem o nome e o cpf do seu respectivo titular.
- Uma conta deve ter o saldo igual a zero no momento de sua criação.
- Uma vez definidos, os dados do titular da conta devem permanecer imutáveis.
- É possível acessar publicamente o nome do titular, seu CPF, seu saldo e a data em que a conta foi criada.
- Uma conta só pode realizar empréstimo 2 anos após ter sido criada e se seu saldo for igual ou superior a R$5000.
- Qualquer conta, exceto as de nível 'premium', não pode acumular mais do que R$5000 em saldo.
- Não é possível depositar um valor menor ou igual a zero em uma conta.
- Não é possível sacar um valor maior do que o armazenado em uma conta.