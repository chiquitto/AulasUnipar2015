/*
Herança

Principio que permite que classes compartilhem atributos e métodos, através de "heranças". Usada na intenção de reaproveitar código ou comportamento generalizado ou especializar operações ou atributos.
*/

public class Animal {
	public void acordar() {
		// Acordar
	}

	public void dormir() {
		// Dormir
	}
}

public class Cachorro
extends Animal {
	public void latir() {
		// Latir
	}
}

public class Gato
extends Animal {
	public void miar() {
		// Miar
	}
}