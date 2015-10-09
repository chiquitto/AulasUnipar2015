<?php

class Application_Form_Post extends Zend_Form {

    public function init() {
        $naoVazio = new Zend_Validate_NotEmpty();
        
        $idcategoria = new Zend_Form_Element_Text('idcategoria', array(
            'label' => 'Categoria:',
            'required' => true
        ));
        $this->addElement($idcategoria);
        
        $titulo = new Zend_Form_Element_Text('titulo', array(
            'label' => 'Titulo:',
            'required' => true
        ));
        $titulo->addValidator($naoVazio);
        $this->addElement($titulo);
        
        $texto = new Zend_Form_Element_Textarea('texto', array(
            'label' => 'Texto:',
            'required' => true
        ));
        $texto->addValidator($naoVazio);
        $this->addElement($texto);

        $botao = new Zend_Form_Element_Submit('botao', array(
            'label' => 'Salvar'
        ));
        $this->addElement($botao);
    }

}
