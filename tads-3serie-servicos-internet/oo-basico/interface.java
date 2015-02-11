/*
Interface

A interface de um objeto consiste de um conjunto de métodos que um objeto deve suportar - contrato.
*/

public interface FiguraGeometrica {
	public String getNomeFigura();
	public int getArea();
	public int getPerimetro();
}

public class Quadrado implements FiguraGeometrica {
	private int lado;
	public int getLado() { return lado; }
	public void setLado(int lado) { this.lado = lado; }
	public int getArea() { int area = 0; area = lado * lado; return area; }
	public int getPerimetro() { int perimetro = 0; perimetro = lado * 4; return perimetro; }
	public String getNomeFigura() { return "quadrado"; }
}

public class Triangulo implements FiguraGeometrica {
	private int base;
	private int altura;
	private int ladoA;
	private int ladoB;
	private int ladoC;
	public int getAltura() { return altura; }
	public void setAltura(int altura) { this.altura = altura; }
	public int getBase() { return base; }
	public void setBase(int base) { this.base = base; }
	public int getLadoA() { return ladoA; }
	public void setLadoA(int ladoA) { this.ladoA = ladoA; }
	public int getLadoB() { return ladoB; }
	public void setLadoB(int ladoB) { this.ladoB = ladoB; }
	public int getLadoC() { return ladoC; }
	public void setLadoC(int ladoC) { this.ladoC = ladoC; }
	public String getNomeFigura() { return "Triangulo"; }
	public int getArea() { int area = 0; area = (base * altura) / 2; return area; }
	public int getPerimetro() { return ladoA + ladoB + ladoC; }
}

FiguraGeometrica q = new Quadrado();
q.getArea();

FiguraGeometrica t = new Triangulo();
t.getArea();


interface Animal() {
	void comer();
}

// ===========================

class Gato implements Animal {
	void comer() {
		// Gato comendo
	}
}

class Cachorro implements Animal {
	void comer() {
		// Cachorro comendo
	}
}

Animal animal = new Gato();
animal.comer();
