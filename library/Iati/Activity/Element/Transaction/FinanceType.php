<?php
class Iati_Activity_Element_Transaction_FinanceType extends Iati_Activity_Element
{
    protected $_type = 'FinanceType';
    protected $_parentType = 'Transaction';
    protected $_validAttribs = array('text' => '', '@xml_lang' => '', '@code' => '');
}
