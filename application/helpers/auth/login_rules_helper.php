<?php 
function getLoginRules(){
    return array(
        array(
            'field' => 'email',
            'label' => 'Correo',
            'rules' => 'required|trim',
            'errors' =>array(
                'required' => 'El %s es requido.',
            ),
        ),
        array(
            'field' => 'password',
            'label' => 'Contraseña',
            'rules' => 'required',
            'errors' =>array(
                'required' => 'El %s es requido.',
            ),    
        ),
    );
}