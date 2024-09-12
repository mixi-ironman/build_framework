<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tạo mới sản phẩm</h4>
    </div>
    <div class="card-body">

        <!-- <form action="<?php echo BASE_PATH; ?>product/store" enctype="multipart/form-data" method="POST"> -->
        <!-- @csrf -->
        <form id="studentForm" action="<?php echo BASE_PATH; ?>product/store" enctype="multipart/form-data" method="POST"
            onsubmit="return validateForm()">
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm">
                <small id="nameError" style="color: red;"></small>
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả sản phẩm</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Nhập mô tả sản phẩm">
                <small id="nameError" style="color: red;"></small>
            </div>

            <div class="mb-3">
                <label class="form-label">Giá</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Nhập giá sản phẩm">
                <small id="ageError" style="color: red;"></small>
            </div>

            <div class="mb-3">
                <label class="form-label">Số lượng</label>
                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Nhập số lượng sản phẩm">
                <small id="ageError" style="color: red;"></small>
            </div>

            <div class="mb-3">
                <label for="photo">Ảnh:</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                <small id="photoError" style="color: red;"></small>
            </div>

            <button type="submit" class="btn btn-primary btn-save">Gửi</button>
        </form>
    </div>
</div>