<?php
	$db=$_POST['database'];
	$flag=0;
	$conn=mysql_connect('localhost',$_POST['user_name'],$_POST['password']);
	if(!$conn)
	{
		echo "Connection error ".mysql_error();
	}
	else
	{
		$createdatabaseQuery="Create Database if not exists ".$db;
		if(mysql_query($createdatabaseQuery))
		{		
				if(mysql_select_db($db,$conn))
				{
					$createOrderDetQuery="CREATE TABLE IF NOT EXISTS `order_details` (
  `orders_id` int(11) DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL,
  `color` varchar(45) DEFAULT 'NA',
  `price` int(10) DEFAULT NULL,
  KEY `fk_orders_id` (`orders_id`),
  KEY `fk_products_id` (`products_id`),
  CONSTRAINT `fk_orders_id` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `fk_products_id` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`)
)";
				$insertOrderDetails="INSERT IGNORE INTO `order_details` VALUES (111,1,'black',90),(111,2,'blue',9800),(112,3,'black',98000),(112,5,'yellow',800),(113,4,'Green',5000),(113,3,'Red',54000)";
				$createorderQuery="CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `discount` int(11) DEFAULT '0',
  `users_id` int(11) DEFAULT NULL,
  `order_cost` int(11) DEFAULT NULL,
  `payment_status` varchar(45) DEFAULT NULL,
  `order_created_date` date DEFAULT NULL,
  `mode_of_payment` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
)";
				$insertOrder="INSERT IGNORE INTO `orders` VALUES (111,0,101,9890,'success','2016-11-11','cash'),(112,5,103,93860,'Failed','2015-1-1','debit card'),(113,10,105,53100,'success','2014-6-5','credit card')";
				$createproductsQuery="CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
)";
				$insertProducts="INSERT IGNORE INTO `products` VALUES (1,'Shoes'),(2,'Shirt'),(3,'Trousers'),(4,'Bag'),(5,'Sweaters')";
				$createusersQuery="CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `types_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_types_id` FOREIGN KEY (`types_id`) REFERENCES `types` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
)";
				$insertUsers="INSERT IGNORE INTO `users` VALUES (101,'XYZ','xyz@xyz.com','xyz',1),(102,'ABC','abc@abc.com','abc',2),(103,'PQR','pqr@pqr.com','pqr',1),(104,'DEF','def@def.com','def',2),(105,'UVW','uvw@uvw.com','uvw',1)";
				$createtypesQuery="CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
  )";
  					$inserttypes="INSERT IGNORE INTO `types` VALUES (1,'Buyer'),(2,'Inventory Manager')";
					
					if(mysql_query($createtypesQuery) and mysql_query($createusersQuery)and mysql_query($createorderQuery) and mysql_query($createproductsQuery) and mysql_query($createOrderDetQuery) and mysql_query($inserttypes) and mysql_query($insertUsers) and mysql_query($insertProducts) and mysql_query($insertOrder) and mysql_query($insertOrderDetails))
					{
					//Updating cost with discount
						$q="SELECT orders.id,sum(order_details.price) - sum(order_details.price) * (orders.discount/100) FROM MysqlAs1.order_details,orders,products
								where order_details.orders_id=orders.id
								and order_details.products_id=products.id
								Group by orders.id";
						if($result=mysql_query($q))
						{
							while($row=mysql_fetch_row($result))
							{
								$up="UPDATE orders SET order_cost ='".$row[1]."' WHERE id='".$row[0]."'";
								if(mysql_query($up))
								{
									$flag=1;
								}
								else
								{
									echo "Query update error".mysql_error();
								}
							}
							if($flag==1)
							{
									echo "<b>Database updated successfully with Calculated discounted cost per order Using Query :- </b></br>SELECT orders.id,sum(order_details.price) - sum(order_details.price) * (orders.discount/100) FROM MysqlAs1.order_details,orders,products
								where order_details.orders_id=orders.id
								and order_details.products_id=products.id
								Group by orders.id</br>";
							}
						}
						//creating asked view

						$queryview= "create or replace view DbView as(SELECT orders.id as Id,users.email as email,count(order_details.orders_id) as number_of_products,orders.order_created_date as date,orders.discount as discount,sum(order_details.price) - sum(order_details.price) * (orders.discount/100) as total_cost,orders.mode_of_payment as mode_of_payment,orders.payment_status as payment_status 
			FROM MysqlAs1.order_details,orders,products,users
			where order_details.orders_id=orders.id
			and order_details.products_id=products.id
			and orders.users_id=users.id
			Group by orders.id)";
						if(mysql_query($queryview))
						{
							echo "<b></br>DB view with order details of products sold Created Successfully Using query :-</b></br>create or replace view DbView as(SELECT orders.id as Id,users.email as email,count(order_details.orders_id) as number_of_products,orders.order_created_date as date,orders.discount as discount,sum(order_details.price) - sum(order_details.price) * (orders.discount/100) as total_cost,orders.mode_of_payment as mode_of_payment,orders.payment_status as payment_status 
			FROM MysqlAs1.order_details,orders,products,users
			where order_details.orders_id=orders.id
			and order_details.products_id=products.id
			and orders.users_id=users.id
			Group by orders.id)</br>";
						}
						else
						{
							echo "Query view error".mysql_error();
						}

						//Report for sales of last month
						$querylastmonth="SELECT orders.id,users.email,users.name,GROUP_CONCAT(products.name),GROUP_CONCAT(order_details.price),count(order_details.orders_id),orders.order_created_date,orders.discount,sum(order_details.price) - sum(order_details.price) * (orders.discount/100) ,orders.mode_of_payment,orders.payment_status
			FROM MysqlAs1.order_details,orders,products,users
			where order_details.orders_id=orders.id
			and order_details.products_id=products.id
			and orders.users_id=users.id
			and orders.order_created_date > DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH)
			Group by orders.id";

						echo "</br></br><b>Sales report generated using :-</b></br>SELECT orders.id,users.email,users.name,GROUP_CONCAT(products.name),GROUP_CONCAT(order_details.price),count(order_details.orders_id),orders.order_created_date,orders.discount,sum(order_details.price) - sum(order_details.price) * (orders.discount/100) ,orders.mode_of_payment,orders.payment_status
			FROM MysqlAs1.order_details,orders,products,users
			where order_details.orders_id=orders.id
			and order_details.products_id=products.id
			and orders.users_id=users.id
			and orders.order_created_date > DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH)
			Group by orders.id";


						echo "<h1 align=center>Sales for last month</h1>";
						if($result=mysql_query($querylastmonth))
						{

							echo "<table border=1 cellspacing=0 width=950>";
							echo "<th>Order id</th>";
							echo "<th>Email</th>";
							echo "<th>User Name</th>";
							echo "<th>Name of Products</th>";
							echo "<th>Price of each Product</th>";
							echo "<th>Number of products</th>";
							echo "<th>Date</th>";
							echo "<th>Discount(%)</th>";
							echo "<th>Order Total</th>";
							echo "<th>Payment Mode</th>";
							echo "<th>Payment Status</th>";


							while($row=mysql_fetch_row($result))
							{
								echo "<tr>";
								echo "<br><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td><td>".$row[10]."</td>";
								echo "</tr>";
							}
							echo "</table>";
						}
					}
					else
					{
						echo "error".mysql_error();
					}
			}
		}
		else
		{
			echo "error".mysql_error();
		}
	}

?>