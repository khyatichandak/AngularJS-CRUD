<h2>Product Details</h2><hr/>
<div class="form-group">
    <button type="button" class="btn btn-block btn-success btn-md" ng-click="insertDataForm()" ng-class="{'active' : showInsertForm, 'disable': !showInsertForm}"><b>Add Product</b></button>
</div>

<div id="updateDataForm">
    <form class="form-horizontal" ng-show="showUpdateForm" name="updateForm" novalidate>
        <legend>Update Product Details</legend>
        <input type="hidden" class="form-control input-md" value="{{bookId}}" ng-model="bookId">

        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Book Name</label>  
            <div class="col-md-5">
                <input id="textinput" name="name" type="text" class="form-control input-md" value="{{bookName}}" ng-model="bookName" required>
            </div>
            <div class="col-md-2" ng-show="updateForm.$submitted || updateForm.name.$touched" style="color:red;">
                <span ng-show="updateForm.name.$error.required">Book Name is required.</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="description">Description</label>
            <div class="col-md-5">                     
                <textarea class="form-control" id="description" name="description" ng-model="bookDescription" ng-minlength="100" ng-maxlength="500" required>{{bookDescription}}</textarea>
            </div>
            <div class="col-md-3" ng-show="updateForm.$submitted || updateForm.description.$touched" style="color:red;">
                <span ng-show="updateForm.description.$error.required">Book description is required.</span>
                <span ng-show="updateForm.description.$error.minlength">Book description must be over 100 characters</span>
                <span ng-show="updateForm.description.$error.maxlength">Book description must not exceed 500 characters</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="price">Price</label>  
            <div class="col-md-5">
                <input id="price" name="price" type="tel" class="form-control input-md" value="{{bookPrice}}" ng-model="bookPrice" ng-minlength="3" ng-maxlength="5" required>
            </div>
            <div class="col-md-3" ng-show="updateForm.$submitted || updateForm.price.$touched" style="color:red;">
                <span ng-show="updateForm.price.$error.required">Book Price is required.</span>
                <span ng-show="updateForm.price.$error.minlength">Book Price must be over 3 digits</span>
                <span ng-show="updateForm.price.$error.maxlength">Book Price must be not exceed 5 digits</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="author">Author</label>  
            <div class="col-md-5">
                <input id="author" name="author" type="text" placeholder="" class="form-control input-md" value="{{bookAuthor}}" ng-model="bookAuthor" required>
            </div>
             <div class="col-md-3" ng-show="updateForm.$submitted || updateForm.author.$touched" style="color:red;">
                <span ng-show="updateForm.author.$error.required">Author name is required.</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="author">Category</label>  
            <div class="col-md-5">
                <input id="author" name="category" type="text" placeholder="" class="form-control input-md" value="{{bookCategory}}" ng-model="bookCategory" required>
            </div>
            <div class="col-md-3" ng-show="updateForm.$submitted || updateForm.category.$touched" style="color:red;">
                <span ng-show="updateForm.category.$error.required">Category is required.</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="cancel"></label>
            <div class="col-md-8">
                <button id="cancel" name="cancel" class="btn btn-default" ng-click="cancelUpdate()">Cancel</button>
                <button id="update" name="update" class="btn btn-primary" ng-disabled="updateForm.$invalid" ng-click="updateData(bookId, bookName, bookDescription, bookPrice, bookAuthor, bookCategory)">Update</button>
            </div>
        </div>
    </form>
</div>

<table class="table table-bordered">
    <tr ng-show="showInsertForm" id="insertDataForm">
        <td style="width: 15%" ><input type="text" size="19" placeholder="Book Name" ng-model="addName"></td>
        <td style="width: 50%"><input type="text" size="85" placeholder="Description" ng-model="addDescription"></td>
        <td style="width: 5%"><input type="text" size="2" placeholder="Price" ng-model="addPrice"></td>
        <td style="width: 14%"><input type="text" size="14" placeholder="Author" ng-model="addAuthor"></td>
        <td style="width: 10%"><input type="text" size="10" placeholder="Category" ng-model="addCategory"></td>
        <td style="width: 6%"><button class="btn btn-sm btn-primary" ng-click="addData(addName, addDescription, addPrice, addAuthor, addCategory)"><span class="glyphicon glyphicon-plus"></span></button>
            <button class="btn btn-sm btn-danger" ng-click="cancelAddData()"><span class="glyphicon glyphicon-remove"></span></button>
        </td>
    </tr>

    <th style="width: 15%">Book Name</th>        
    <th style="width: 50%">Description</th>
    <th style="width: 5%">Price</th>
    <th style="width: 14%">Author</th>
    <th style="width: 10%">Category</th>
    <th style="width: 6%">&nbsp;</th>

    <tr ng-repeat="book in books">
        <td>{{book.book_name}}</td>
        <td>{{book.book_description}}</td>
        <td>{{book.book_price}}</td>
        <td>{{book.book_author}}</td>
        <td>{{book.category}}</td>
        <td><a ng-click="updateDataForm(book)"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;
            <a ng-click="deleteData(book.id)"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>

</table>