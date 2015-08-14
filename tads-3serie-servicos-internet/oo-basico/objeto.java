/*
Objeto / Instancia

Instancia é a concretização de uma classe. Em termos intuitivos, uma classe é como um "molde" que gera instâncias de um certo tipo; um objeto é algo que existe fisicamente e que foi "moldado" na classe.
*/

// Classe
class Animal
{
   // Atributo
   protected string especie;
 
   // Construtor
   public Animal(string especie)
   {
      this.especie = especie;
   }
 
   // Execução
   static void Main(string[] args)
   {
      // Instâncias
      Animal cachorro = new Animal("Canis lupus familiaris");
      Animal gato = new Animal("Felis catus");
      Animal lobo = new Animal("Canis lupus");
   }
}