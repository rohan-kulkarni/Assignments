<?php
class employeesModel extends AppModel {
	var $name = 'Employees';
	var $validate = array(
		'emp_no' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		),
		'birth_date' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		),
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		),
		'gender' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		),
		'hire_date' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		),
	);

	var $belongsTo = array(
		'departments' => array(
			'className' => 'departmentsModel',
			'foreignKey' => 'dept_no'
		),
	);

	public function findFirstEmployee() 
	{
	    $firstEmployee = $this->employeesModel->find('first');
	}
	public function countEmployees() 
	{
    	$totalEmployees = $this->employeesModel->find('count');
	}
	public function findAllEmployees() 
	{
    	$allEmployees = $this->employeesModel->find('all');
    }
}
