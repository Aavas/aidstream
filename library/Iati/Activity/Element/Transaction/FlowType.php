<?php
class Iati_Activity_Element_Transaction_FlowType extends Iati_Activity_Element
{
    protected $_type = 'FlowType';
    protected $_parentType = 'Transaction';
    protected $_validAttribs = array('text' => '', '@xml_lang' => '', '@code' => '');
}
