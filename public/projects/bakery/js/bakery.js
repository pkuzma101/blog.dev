"use strict";

(function() {
	var app = angular.module("bakedGoods", []);

	// app.controller("CartController", ['$scope', function($scope) {
	app.controller('CartController', function($scope, $http) {
		$scope.lineup = {
			items: [
				{
					name: 'Muffin',
					price: 1,
					image: 'img/muffin.jpg',
					quantity: 1
				},
				{
					name: 'Cupcake',
					price: 1.5,
					image: 'img/cupcake.jpg',
					quantity: 1
				},
				{
					name: 'Cake',
					price: 10,
					image: 'img/birthday.jpg',
					quantity: 1
				},
				{
					name: 'Danish',
					price: 2,
					image: 'img/danish.jpg',
					quantity: 1
				},
				{
					name: 'Cookie',
					price: 1,
					image: 'img/cookie.jpg',
					quantity: 1
				},
				{
					name: 'Donut',
					price: 1.5,
					image: 'img/donut.jpg',
					quantity: 1
				},
			]
		};

		$scope.cart = {
			goods: []
		};

		$scope.addToCart = function(item) {
			$scope.cart.goods.push({
				name: item.name,
				price: item.price,
				quantity: 1
			});
		},

		// $scope.addItem = function() {
		// 	$scope.lineup.items.push({
		// 		name: '',
		// 		price: '',
		// 		quantity: 1
		// 	});
		// },

		$scope.deleteItem = function(item) {
			var index = $scope.cart.goods.indexOf(item);
			$scope.cart.goods.splice(index, 1);
		},

		$scope.total = function() {
			var total = 0;
			var new_total = 0;
			angular.forEach($scope.cart.goods, function(value) {
				total += value.quantity * value.price;
				new_total = total + (total - (total * 0.8125));
			})
			return new_total;
		}

		$scope.getOrders = function() {
			$http.get("get_orders.php").success(function(data) {
				$scope.results = data.orders;
			})
			return $scope.results;
		}

		$scope.insertOrder = function() {
			$http.post('insert_order.php', {
				'customer': angular.element('#customer').val(),
				'muffin': angular.element('#muffin').val(),
				'cupcake': angular.element('#cupcake').val(),
				'cake': angular.element('#cake').val(),
				'danish': angular.element('#danish').val(),
				'cookie': angular.element('#cookie').val(),
				'donut': angular.element('#donut').val(),
				'price': angular.element('#price').val()
				}
			).success(function(data) {
				console.log(data);
				console.log("Success");

			});
		}
	});
})();
