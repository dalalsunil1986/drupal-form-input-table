<?php
namespace Drupal\tradesteps\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class FormInputTable extends FormBase {

    public function getFormId() {
        return 'tradesteps_form_input_table';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {
        
        // Add the headers.
        $form['contacts'] = array(
                                    '#type' => 'table',
                                    '#title' => 'Sample Table',
                                    '#header' => array('Name', 'Phone', 'Checkboxes'),
                                );
        
        // Add input fields in table cells.
        for ($i=1; $i<=4; $i++) {
            $form['contacts'][$i]['name'] = array(
                                                '#type' => 'textfield',
                                                '#title' => t('Name'),
                                                '#title_display' => 'invisible',
                                                '#default_value' => 'name'.$i,
                                            );

            $form['contacts'][$i]['phone'] = array(
                                                '#type' => 'tel',
                                                '#title' => t('Phone'),
                                                '#title_display' => 'invisible',
                                                '#default_value' => '763-999-444'.$i,
                                            );
                                            

            $form['contacts'][$i]['checkboxes'] = array(
                                                '#type' => 'checkboxes',
                                                '#title' => t('Checkboxes'),
                                                '#options' => [1 => 'One', 2 => 'Two'],
                                            );                                            
        }
    
    
        // Add a submit button that handles the submission of the form.
        $form['actions']['submit'] = [
                                        '#type' => 'submit',
                                        '#value' => $this->t('Submit'),
                                    ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        // Find out what was submitted.
        $values = $form_state->getValues();
        drupal_set_message(print_r($values['contacts'],true));
    }

}
