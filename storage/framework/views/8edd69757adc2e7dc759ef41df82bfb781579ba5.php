<link rel="stylesheet" href="<?php echo e(asset('css\mystyle.css')); ?>">

	 <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>id</th>
	                                    	<th>Tên sản phẩm</th>
	                                    	<th>Ngày nhập</th>
	                                    	<th>Mã loại sản phẩm</th>
	                                    	<th>Giá Bán</th>
	                                    	<th>Giá Bán</th>
	                                    	<th>Tình Trạng</th>
	                                    	<th>Số lượng hiện có</th>
	                                    </thead>
	   <tbody id="td">   
	   <?php $__currentLoopData = $sanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($value->id); ?></td>
					<td><?php echo e($value->TenSanPham); ?></td>
					<td><?php echo e($value->NgayNhap); ?></td>
					<td><?php echo e($value->MaLoaiSP); ?></td>
					<td><?php echo e($value->GiaVon); ?></td>
					<td><?php echo e($value->GiaBan); ?></td>
					<td><?php echo e($value->id_TinhTrang); ?></td>
					<td><?php echo e($value->SoLuongHienCo); ?></td>
				</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
</tbody>
	                                </table>

	                            </div> 

<?php echo $sanpham-> links(); ?>

hello