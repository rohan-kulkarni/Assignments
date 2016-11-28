<?php
class departmentsModel extends AppModel {
	var $name = 'Employees';
	var $validate = array(
		'dept_no' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		),
		'dept_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		)
	);

	var $belongsTo = array(
		'employees' => array(
			'className' => 'employeesModel',
			'foreignKey' => 'emp_no'
		),
	);
	public function findFirstDepartment() 
	{
	    $firstDepartment = $this->departmentsModel->find('first');
	}
	public function countDepartments() 
	{
    	$totalDepartments = $this->departmentsModel->find('count');
	}
	public function findAllDepartments() 
	{
    	$allDepartments = $this->departmentsModel->find('all');
    }
}
