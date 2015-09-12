<?php

class Application_Form_Cliente extends Zend_Form {

    public function init() {
        $nome = new Zend_Form_Element_Text('nome', array(
            'label' => 'Nome:',
            'required'=> true
        ));
      $val = new Zend_Validate_StringLength(array('min'=> 10));
      $nome->addValidator($val);
      
      $upper = new Zend_Filter_StringToUpper();
      $nome->addFilter($upper);
      
      $this->addElement($nome);

      $email = new Zend_Form_Element_Text('email', array(
         'label'  => 'Email:'
      ));
      $isEmail = new Zend_Validate_EmailAddress();
      $email->addValidator($isEmail);
      
      $this->addElement($email);
      
      $senha = new Zend_Form_Element_Password('senha',
        array(
           'label'  => 'Senha:',
            'required' => true
        ));
      
     $lenghtSenha = new Zend_Validate_StringLength(array('min'=>5,'max'=>15));
      $senha->addValidator($lenghtSenha);
      $this->addElement($senha);
      
      $endereco = new Zend_Form_Element_Text('endereco',
              array(
                  'label' => 'Endereço:'
              ));
      
      $this->addElement($endereco);
      
      $bairro = new Zend_Form_Element_Text('bairro',
              array(
                  'label' => 'Bairro:'
              ));
      
      $this->addElement($bairro);
      
      $cep = new Zend_Form_Element_Text('cep',
              array(
                  'label' => 'CEP:'
              ));
      
      $this->addElement($cep);
      
      $pais = new Zend_Form_Element_Text('pais',
              array(
                  'label' => 'País:'
              ));
      
      $this->addElement($pais);      
  
      
        $botao = new Zend_Form_Element_Submit('botao', array(
            'label' => 'Salvar'
        ));
        $this->addElement($botao);
    }
    
    

}
