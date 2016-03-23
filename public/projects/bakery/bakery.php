<?php
require '../../../config.bakery.php';

?>

<!DOCTYPE html>
<html ng-app="bakedGoods">
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Sniglet:400,800|Knewave|Fredoka+One' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/bakery.css">
		<title>Baked Goods Store</title>
	</head>
	<body>
		<section id="baked_goods_page" class="container-fluid">
			<a href="/portfolio" class="btn btn-default" id="back">Back</a>
			
			<article id="title_box">
				<h1>Baked Goods Store</h1>
			</article>

			<article id="store_front" ng-controller="CartController as cart">
				<div id="goods_section">
					<div class="card" ng-repeat="item in lineup.items">
						<div class="top_half">
							<img ng-src="{{ item.image }}">
						</div>
						<div class="bottom_half">
							<p class="name">{{ item.name }}</p>
							<p class="price">{{ item.price | currency}}</p>
							<p class="button_p">
								<a href ng-click="addToCart(item); custom=!custom" class="add_btn">
									<span ng-hide="custom">Buy</span>
								</a>
								<a href ng-click="deleteItem(item); custom=!custom" class="add_btn">
									<span ng-show="custom">Remove</span>
								</a>
							</p>
						</div>
					</div>
				</div>

				<div id="shopping_cart">
					<table id="cart_table">
						<tr>
							<td>Name:</td>
							<td><input type="text" ng-model="customer" id="customer" name="customer" placeholder="Name of Customer" /></td>
						</tr>
						<tr ng-repeat="value in cart.goods">
							<td ng-model="value.name">{{ value.name }}</td>
							<td ng-model="value.price">{{ value.price | currency }}</td>
							<td><input type="number" ng-model="value.quantity" id="quan"></td>
							<td>{{ value.quantity * value.price | currency }}</td>
							<input type="hidden" id="{{ value.name | lowercase }}" name="{{ value.name | lowercase }}" value="{{ value.quantity }}" />
						</tr>
						<tr id="total_row">
							<td>Total:</td>
							<td>{{ total() | currency }}</td>
							<input type="hidden" id="price" name="price" ng-model="price" value="{{ total() | currency }}" />
						</tr>
						<tr>
							<td id="button_row"><a href="#/" id="submit_btn" name="submit_btn" ng-click="insertOrder()"><span>Place Order</span></a></td>
						</tr>
					</table>
					<p>*All orders have a tax of 8.125% added</p>
				</div>

				<div id="order_box">
					<h2>Orders</h2>
					<table id="order_table">
						<tbody ng-init="getOrders()">
							<tr>
								<th>Customer</th>
								<th>Muffins</th>
								<th>Cupcakes</th>
								<th>Cakes</th>
								<th>Danishes</th>
								<th>Cookies</th>
								<th>Donuts</th>
								<th>Price</th>
							</tr>
							<tr ng-repeat="v in results | filter:search" style="width: 100%;">
								<td>{{ v.customer }}</td>
								<td>{{ v.muffin }}</td>
								<td>{{ v.cupcake }}</td>
								<td>{{ v.cake }}</td>
								<td>{{ v.danish }}</td>
								<td>{{ v.cookie }}</td>
								<td>{{ v.donut }}</td>
								<td>{{ v.price }}</td>
							</tr>
						</tbody>
					</table>
				</div>

			</article>

		</section>

		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
		<script type="text/javascript" src="js/bakery.js"></script>

	</body>
</html>