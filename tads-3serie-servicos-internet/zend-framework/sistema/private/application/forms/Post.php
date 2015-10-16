<?php

class Application_Form_Post extends Zend_Form {

    public function init() {
        $naoVazio = new Zend_Validate_NotEmpty();
        
        $categoriaTB = new Application_Model_DbTable_Categoria();
        
        $categorias = $categoriaTB->fetchAll(null, 'categoria');
        
        $array = array(0=>'Selecione uma categoria');
        
        foreach($categorias as $categoria)
        {
            $array[$categoria->idcategoria] = $categoria->categoria;
        }
        
        $idcategoria = new Zend_Form_Element_Select('idcategoria', array(
            'label' => 'Categoria:',
            'required' => true,
            'multioptions' => $array, 
        ));
        
        $idcategoria->addValidator($naoVazio);
        
        $filter = new Zend_Filter_Null();
        
        $idcategoria->addFilter($filter);
        
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
        
        $idpost = new Zend_Form_Element_Hidden('idpost');
        $this->addElement($idpost);
    }

}
