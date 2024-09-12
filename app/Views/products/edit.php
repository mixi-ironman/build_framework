<div class="card">
    <div class="card-header">
        <h4 class="card-title">Sửa thông tin sinh viên</h4>
    </div>
    <div class="card-body">
        <form id="editStudentForm" action="<?php echo BASE_PATH; ?>product/update/<?php echo $data['product']->id; ?>"
            enctype="multipart/form-data" method="POST" onsubmit="return validateForm(true)">
            <div class="mb-3">
                <label class="form-label">Sửa tên sản phẩm</label>
                <input type="text" class="form-control" name="name" id="name"
                    value="<?php echo $data['product']->name; ?>">
                <small id="nameError" style="color: red;"></small>
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả sản phẩm</label>
                <input type="text" class="form-control" name="description" id="description"  value="<?php echo $data['product']->description; ?>">
                <small id="nameError" style="color: red;"></small>
            </div>

            <div class="mb-3">
                <label class="form-label">Giá</label>
                <input type="text" class="form-control" name="price" id="price"  value="<?php echo $data['product']->price; ?>">
                <small id="ageError" style="color: red;"></small>
            </div>

            <div class="mb-3">
                <label class="form-label">Số lượng</label>
                <input type="text" class="form-control" name="quantity" id="quantity"  value="<?php echo $data['product']->quantity; ?>">
                <small id="ageError" style="color: red;"></small>
            </div>

            <div class="mb-3">
                <label class="form-label">Ảnh hiện tại</label>
                <?php if (!empty($data['product']->image)): ?>
                <div>
                    <img src="<?php echo BASE_PATH; ?><?php echo $data['product']->image; ?>" alt="Ảnh sinh viên"
                        style="max-width: 300px; max-height: 300px;">
                </div>
                <?php else: ?>
                <p>Chưa có ảnh</p>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="photo">Ảnh:</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                <small id="photoError" style="color: red;"></small>
            </div>

            <button type="submit" class="btn btn-primary btn-save">Cập nhật</button>
        </form>
    </div>
</div>