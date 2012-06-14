<?php
class Simplified_Form_Activity_Default extends App_Form
{
    protected $data;
    public function init(){

        $model = new Model_Wep();
        
        $this->setAttrib('id' , 'simplified-default-form')
            ->setIsArray(true);
        $form = array();
        
        $form['activity_id'] = new Zend_Form_Element_Hidden('activity_id');
        $form['activity_id']->setValue($this->data['activity_id']);

        $form['identifier_id'] = new Zend_Form_Element_Hidden('identifier_id');
        $form['identifier_id']->setValue($this->data['identifier_id']);
        
        $form['identifier'] = new Zend_Form_Element_Text('identifier');
        $form['identifier']->setLabel('Project Identifier')
            ->setRequired()
            ->setValue($this->data['identifier'])
            ->setAttrib('class', 'form-text');
            
        $form['title_id'] = new Zend_Form_Element_Hidden('title_id');
        $form['title_id']->setValue($this->data['title_id']);
        
        $form['title'] = new Zend_Form_Element_Text('title');
        $form['title']->setLabel('Title')
            ->setRequired()
            ->setValue($this->data['title'])
            ->setAttrib('class', 'form-text');
            
        $form['description_id'] = new Zend_Form_Element_Hidden('description_id');
        $form['description_id']->setValue($this->data['description_id']);
        
        $form['description'] = new Zend_Form_Element_Textarea('description');
        $form['description']->setLabel('Description')
            ->setRequired()
            ->setValue($this->data['description'])
            ->setAttrib('COLS', '40')
            ->setAttrib('ROWS', '4')
            ->setAttrib('class', 'form-text');
            
        $form['funding_org_id'] = new Zend_Form_Element_Hidden('funding_org_id');
        $form['funding_org_id']->setValue($this->data['funding_org_id']);

        $form['funding_org'] = new Zend_Form_Element_Text('funding_org');
        $form['funding_org']->setLabel('Funding Organisation')
            ->setRequired()
            ->setValue($this->data['funding_org'])
            ->setAttrib('class', 'form-text');
            
        $form['start_date_id'] = new Zend_Form_Element_Hidden('start_date_id');
        $form['start_date_id']->setValue($this->data['start_date_id']);

        $form['start_date'] = new Zend_Form_Element_Text('start_date');
        $form['start_date']->setLabel('Actual Start Date')
            ->setRequired()
            ->setValue($this->data['start_date'])
            ->setAttrib('class', 'form-text datepicker');
            
        $form['end_date_id'] = new Zend_Form_Element_Hidden('end_date_id');
        $form['end_date_id']->setValue($this->data['end_date_id']);

        $form['end_date'] = new Zend_Form_Element_Text('end_date');
        $form['end_date']->setLabel('Actual End Date')
            ->setRequired()
            ->setValue($this->data['end_date'])
            ->setAttrib('class', 'form-text datepicker');
        
        $form['document_id'] = new Zend_Form_Element_Hidden('document_id');
        $form['document_id']->setValue($this->data['document_id']);

        $form['document_url'] = new Zend_Form_Element_Text('document_url');
        $form['document_url']->setLabel('Document Url')
            ->setValue($this->data['document_url'])
            ->setAttrib('class', 'form-text');
            
        $form['document_category_id'] = new Zend_Form_Element_Hidden('document_category_id');
        $form['document_category_id']->setValue($this->data['document_category_id']);

        $categoryCodes = $model->getCodeArray('DocumentCategory' , '' , 1 , true);
        $form['document_category_code'] = new Zend_Form_Element_Select('document_category_code');
        $form['document_category_code']->setLabel('Document Category Code')
            ->addMultiOptions($categoryCodes)
            ->setValue($this->data['document_category_code'])
            ->setAttrib('class', 'form-text');
            
        $form['document_title_id'] = new Zend_Form_Element_Hidden('document_title_id');
        $form['document_title_id']->setValue($this->data['document_title_id']);

        $form['document_title'] = new Zend_Form_Element_Text('document_title');
        $form['document_title']->setLabel('Document Title')
            ->setValue($this->data['document_title'])
            ->setAttrib('class', 'form-text');
            
        $form['location_id'] = new Zend_Form_Element_Hidden('location_id');
        $form['location_id']->setValue($this->data['location_id']);

        $form['location_name'] = new Zend_Form_Element_Text('location_name');
        $form['location_name']->setLabel('District/VDC Name')
            ->setRequired()
            ->setValue($this->data['location_name'])
            ->setAttrib('class', 'form-text');
            
        
        
        $this->addElements($form);
        
        // Budget
        if($this->data['budget']){
            foreach($this->data['budget'] as $key=>$budgetData){
                $budget = new Simplified_Form_Activity_Budget(array('data' => $budgetData , 'count' => $key));
                $this->addSubForm($budget , 'budget'.$key);
                $budget->removeDecorator('form');
            }
        } else {
            $budget = new Simplified_Form_Activity_Budget(array('data' => $budgetData));
            $this->addSubForm($budget , 'budget');
            $budget->removeDecorator('form');
        }
        
        // Commitment
        if($this->data['commitment']){
            foreach($this->data['commitment'] as $key=>$commitmentData){
                $commitment = new Simplified_Form_Activity_Transaction_Commitment(array('data' => $commitmentData , 'count' => $key));
                $this->addSubForm($commitment , 'commitment'.$key);
                $commitment->removeDecorator('form');
            }
        } else {
            $commitment = new Simplified_Form_Activity_Transaction_Commitment();
            $this->addSubForm($commitment , 'commitment');
            $commitment->removeDecorator('form');
        }
        
        // incommingFund
        if($this->data['incommingFund']){
            foreach($this->data['incommingFund'] as $key=>$incommingFundData){
                $incommingFund = new Simplified_Form_Activity_Transaction_IncommingFund(array('data' => $commitmentData , 'count' => $key));
                $this->addSubForm($incommingFund , 'incommingFund'.$key);
                $incommingFund->removeDecorator('form');
            }
        } else {
            $incommingFund = new Simplified_Form_Activity_Transaction_IncommingFund();
            $this->addSubForm($incommingFund , 'incommingFund');
            $incommingFund->removeDecorator('form');
        }
        
        // Expenditure
        if($this->data['expenditure']){
            foreach($this->data['expenditure'] as $key=>$expenditureData){
                $expenditure = new Simplified_Form_Activity_Transaction_Expenditure(array('data' => $expenditureData , 'count' => $key));
                $this->addSubForm($expenditure , 'expenditure'.$key);
                $expenditure->removeDecorator('form');
            }
        } else {
            $expenditure = new Simplified_Form_Activity_Transaction_Expenditure();
            $this->addSubForm($expenditure , 'expenditure');
            $expenditure->removeDecorator('form');
        }
        
        $form['sector_id'] = new Zend_Form_Element_Hidden('sector_id');
        $form['sector_id']->setValue($this->data['sector_id']);
        
        $form['sector'] = new Zend_Form_Element_Text('sector');
        $form['sector']->setLabel('Sector')
            ->setRequired()
            ->setValue($this->data['sector'])
            ->setAttrib('class', 'form-text');
        $this->addElements($form);
        
        foreach($form as $item_name=>$element)
        {
            $form[$item_name]->addDecorators( array(
                        array(array( 'wrapperAll' => 'HtmlTag' ), array( 'tag' => 'div','class'=>'clearfix form-item'))
                    )
            );
        }
        
        $submit = new Zend_Form_Element_Submit('Submit');
        $submit->setValue('Save');
        $this->addElement($submit);
    }
    
    public function setData($data)
    {
        $this->data = $data;
    }
}