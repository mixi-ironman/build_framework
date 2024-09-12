<div class="card">
    <div class="card-header">
        <a href="<?php echo BASE_PATH; ?>product/create"
            style="display: inline-block; color: red; font-size:18px; font-style: italic; margin-bottom: 20px; text-decoration: none; border-radius: 5px; padding: 3px 4px; box-shadow: 1px 4px black; font-style: normal;"><i
                class="fa-solid fa-plus icon-add"></i> Tạo mới sản phẩm
        </a>

        <?php if (isset($_SESSION['flash_message'])): ?>
        <div id="flash-message" style="width : 400px;"
            class="alert alert-<?= $_SESSION['flash_message']['type']; ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['flash_message']['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                    style="transform:translateY(-3px) ;" class="fa-solid fa-x"></i></button>
        </div>
        <?php unset($_SESSION['flash_message']); // Xóa thông báo sau khi hiển thị ?>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="header-position" style="background-color: #cbd8d6 !important;">
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th class="text-center" style="width: 200px;">Tên sản phẩm</th>
                    <th class="text-center" style="width: 200px;">Ảnh sản phẩm</th>
                    <th class="text-center" style="width: 100%;">Mô tả</th>
                    <th class="text-center" style="width: 100px;">Giá</th>
                    <th class="text-center" style="width: 50px;">Số lượng</th>x
                    <th class="text-center" style="width: 50px;">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['products'] as $key => $product): ?>
                <tr>
                    <td class="text-center" style="vertical-align: middle;"><?php echo $key?></td>
                    <td class="text-center" style="vertical-align: middle;">
                        <a href="<?php echo BASE_PATH; ?>product/show/<?php echo $product->id; ?>"
                            class="modal_detail-product" productId="<?php echo $product->id; ?>"
                            style="cursor : pointer"><?php echo $product->name; ?></a></td>
                    <td class="text-center" style="vertical-align: middle;">
                        <img src="<?php echo BASE_PATH; ?><?php echo $product->image;?>" alt="Ảnh sinh viên"
                            style="width: 180px ;height:150px; object-fit: cover; border-radius:20px;">
                    </td>
                    <td
                        style="vertical-align: middle; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;-webkit-line-clamp:4;line-clamp: 4; text-overflow: ellipsis; max-width: 300px;white-space: normal; line-height:33px; text-align: justify;">
                        <?php echo $product->description; ?></td>
                    <td class="text-center" style="vertical-align: middle;">
                        <?php echo number_format($product->price); ?> <span
                            style="display:inline-block; font-size: 12px; transform: translateY(-5px);color:red;">₫</span>
                    </td>
                    <td class="text-center" style="vertical-align: middle;"><?php echo $product->quantity; ?></td>


                    <td class="text-center" style="vertical-align: middle; width: 50px;">
                        <div class="dropdown">
                            <!-- <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            </button> -->
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"
                                style="padding: 2px 8px 2px 6px; background-color: white; color: black;">
                            </a>

                            <ul class="dropdown-menu">
                                <!-- href="<?php echo BASE_PATH; ?>product/edit/<?php echo $product->id; ?>" -->
                                <li><a class="dropdown-item text-center btn-modal_edit"
                                        href="<?php echo BASE_PATH; ?>product/edit/<?php echo $product->id; ?>">Edit</a>
                                </li>
                                <li><a class="dropdown-item text-center btn-modal_edit"
                                        href="<?php echo BASE_PATH; ?>product/delete/<?php echo $product->id; ?>"
                                        onclick="return confirm('Bạn có chắc muốn xóa?')">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- <div class="card-footer" style="display:flex; justify-content: center;">
        <nav aria-label="Page navigation">
            <ul class="pagination float-end">
                <?php if ($data['page'] != 1 || !isset($data['page'])) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= '<?php echo BASE_PATH; ?>product/index/' . $data['page'] - 1 ?>"
                        aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $data['totalPage']; $i++) : ?>
                <li class="page-item <?= $data['page'] == $i ? 'active' : '' ?>">
                    <a class="page-link"
                        href="<?php echo BASE_PATH; ?>product/index?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php endfor; ?>

                <?php if ($data['page'] != $data['totalPage']) : ?>
                <li class="page-item">
                    <button type="button" class="page-link"
                        href="<?= '<?php echo BASE_PATH; ?>product/index/' . $data['page'] + 1 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </button>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div> -->

    <div class="modal-edit">
        <div class="content-toast-wrap">
            <div class="card edit-product">
                <div style="width:100%; display:flex; align-items: center;justify-content: space-between;">
                    <h5 class="card-title">Thông tin sản phẩm</h5>
                    <p class="close-edit" style="cursor : pointer; font-size: 18px;"><i class="fa-solid fa-x"></i></p>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
</div>