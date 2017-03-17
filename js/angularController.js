var app = angular.module('myApp', ['ngRoute']);

app.config(['$routeProvider', function ($routeProvider) {
        $routeProvider
                .when('/', {
                    templateUrl: 'templates/showData.php',
                    controller: 'showDataController'
                })
                .otherwise({
                    redirectTo: '/'
                });
    }]);

app.controller('showDataController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
        $scope.showUpdateForm = false;
        $scope.showInsertForm = false;
        getAllProducts();
        function getAllProducts() {
            $http({
                url: 'templates/getData.php',
                method: 'POST'
            })
                    .then(function (data) {
                        $scope.books = data.data;
                    });
        }
        $scope.deleteData = function (id) {
            var ans = confirm("Are you sure to delete this product ?");
            if (ans) {
                $http({
                    url: 'templates/deleteData.php',
                    method: 'POST',
                    data: {id: id}
                })
                        .then(function (data) {
                            getAllProducts();
                            alert(data.data);
                        });
            }

        };
        $scope.updateDataForm = function (book) {
            $window.scrollTo(0, angular.element(document.getElementById('updateDataForm')).offsetTop);
            $scope.showUpdateForm = true;
            $scope.bookId = book.id;
            $scope.bookName = book.book_name;
            $scope.bookDescription = book.book_description;
            $scope.bookPrice = book.book_price;
            $scope.bookAuthor = book.book_author;
            $scope.bookCategory = book.category;
            $scope.bookImage = book.book_image;
        };
        $scope.updateData = function (bookId, bookName, bookDescription, bookPrice, bookAuthor, bookCategory) {
            $http({
                url: 'templates/updateData.php',
                method: 'POST',
                data: {id: bookId, name: bookName, description: bookDescription, price: bookPrice, author: bookAuthor, category: bookCategory}
            })
                    .then(function (data) {
                        alert(data.data);
                        var ans = data.data;
                        if (ans.indexOf("successfully") > 0) {
                            $scope.showUpdateForm = false;
                        } else {
                            $scope.showUpdateForm = true;
                        }
                        getAllProducts();
                    });
        };
        $scope.cancelUpdate = function () {
            $scope.showUpdateForm = false;
        };
        $scope.cancelAddData = function () {
            $scope.showInsertForm = false;
            clearData();
        };
        $scope.insertDataForm = function () {
            $window.scrollTo(0, angular.element(document.getElementById('insertDataForm')).offsetTop);
            $scope.showInsertForm = !$scope.showInsertForm;
        };
        $scope.addData = function (addName, addDescription, addPrice, addAuthor, addCategory) {
            $http({
                url: 'templates/insertData.php',
                method: 'POST',
                data: {name: addName, description: addDescription, price: addPrice, author: addAuthor, category: addCategory}
            })
                    .then(function (data) {
                        alert(data.data);
                        var ans = data.data;
                        if (ans.indexOf("successfully") > 0) {
                            $scope.showInsertForm = false;
                            clearData();
                        } else {
                            $scope.showInsertForm = true;
                        }
                        getAllProducts();
                    });
        };
        function clearData() {
            $scope.addName = "";
            $scope.addDescription = "";
            $scope.addPrice = "";
            $scope.addAuthor = "";
            $scope.addCategory = "";
        };
    }]);
