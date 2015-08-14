/*
Métodos

uma função (ou procedimento) associada a um objeto, e que possui acesso aos seus dados (atributos)
*/

public class ContaBancaria {
     private int saldo;

     ContaBancaria() {
     	this.saldo = 0;
     }

     public void depositar(int qtd) {
     	if (valorDoEnvelope == qtd) {
     		this.saldo += qtd;
     	}
     	else {
     		this.saldo += valorDoEnvelope;
     	}
     }

     public int getSaldo() {
     	return this.saldo;
     }

     public void retirar(int qtd) {
     	this.saldo -= qtd;
     }
}

ContaBancaria c = new ContaBancaria();
c.depositar(100);

System.out.println(c.getSaldo());




