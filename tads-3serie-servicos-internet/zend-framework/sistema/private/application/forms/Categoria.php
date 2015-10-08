<?php

class Application_Form_Categoria extends Zend_Form {

    public function init() {
        $categoria = new Zend_Form_Element_Text('categoria', array(
            'label' => 'Categoria:',
            'required' => true
        ));
        $val = new Zend_Validate_StringLength(array('min' => 3));
        $categoria->addValidator($val);
        
        $filtro = new Zend_Filter_StringToUpper();
        $categoria->addFilter($filtro);
        
        $this->addElement($categoria);

        $botao = new Zend_Form_Element_Submit('botao', array(
            'label' => 'Salvar'
        ));
        $this->addElement($botao);
    }

}
