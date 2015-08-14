/*
Atributo

São os elementos que definem a estrutura de uma classe. Os atributos também são conhecidos como variáveis de classe
*/

public abstract class Eletrodomestico {
    private boolean ligado;
    private int voltagem;
 
    // métodos abstratos //
    /*
     * não possuem corpo, da mesma forma que
     * as assinaturas de método de uma interface
     */
    public abstract void ligar();
    public abstract void desligar();
 
    // método construtor //
    /*
     * Classes Abstratas também podem ter métodos construtores,
     * porém, não podem ser usados para instanciar um objeto diretamente
     */
    public Eletrodomestico(boolean ligado, int voltagem) {
        this.setLigado(ligado);
        this.setVoltagem(voltagem);
    }
 
    // métodos concretos
    /*
     * Uma classe abstrata pode possuir métodos não abstratos
     */
    public void setVoltagem(int voltagem) {
        this.voltagem = voltagem;
    }
 
    public int getVoltagem() {
        return this.voltagem;
    }
 
    public void setLigado(boolean ligado) {
        this.ligado = ligado;
    }
 
    public boolean isLigado() {
        return ligado;
    }
}

public class Radio extends Eletrodomestico {
 
	//atributos...
	public static final short AM = 1;
    public static final short FM = 2;
    private int banda;
    private float sintonia;
    private int volume;
 
    //metodos do classe Radio...
 
 
 
    //metodo construtor...
    public Radio(int voltagem) {
        super(true, voltagem);
        setBanda(Radio.FM);
        setSintonia(0);
        setVolume(0);
    }
 
    /**
	 * @return the banda
	 */
	public int getBanda() {
		return banda;
	}
 
	/**
	 * @param banda the banda to set
	 */
	public void setBanda(int banda) {
		this.banda = banda;
	}
 
	/**
	 * @return the sintonia
	 */
	public float getSintonia() {
		return sintonia;
	}
 
	/**
	 * @param sintonia the sintonia to set
	 */
	public void setSintonia(float sintonia) {
		this.sintonia = sintonia;
	}
 
	/**
	 * @return the volume
	 */
	public int getVolume() {
		return volume;
	}
 
	/**
	 * @param volume the volume to set
	 */
	public void setVolume(int volume) {
		this.volume = volume;
	}
 
 
	/* implementação dos métodos abstratos */
    public void desligar() {
        super.setLigado(false);
        setSintonia(0);
        setVolume(0);
    }
 
    public void ligar() {
        super.setLigado(true);
        setSintonia(88.1f);
        setVolume(25);
    }
 
    // abaixo teríamos todos os métodos construtores get e set...
 
}