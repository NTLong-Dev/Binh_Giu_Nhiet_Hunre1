<?php
$sql_lietke = "SELECT * FROM danhmuc ORDER BY id ASC";
$row_liet_ke = mysqli_query($mysqli,$sql_lietke);
?>
<style>
  .tt{
  position: relative;
  top: -100px;
}
</style>
<body>
<section id="main-content">
	<section class="wrapper">
							<table class="table stats-table tt" style="width:80%"> 
              <td colspan="6" class = "sp" ><h1 style="text-align: center; ">Sản Phẩm</h1></td>  
<tr>
    <th>STT</th>
    <th>Hình Ảnh</th>
    <th>Sản Phẩm</th>
    <th>Giá Tiền</th>
    <th>Danh Mục</th>
    <th>Quản Lý</th>
  </tr>
  <?php
  while($rows = mysqli_fetch_array($row_liet_ke)){

  ?>
  <tr>
  <td><?php echo $rows['id'] ?></td>
  <td><?php echo $rows['HinhAnh'] ?></td>
    <td><?php echo $rows['Ten_Danh_Muc'] ?></td>
    <td><?php echo $rows['GiaTien'] ?>đ</td>
    <td><?php echo $rows['DanhMuc'] ?></td>
    <td><a href="danhmuc/xuly.php?id=<?php echo $rows['id'] ?>">Xoá</a> | <a href="?id=<?php echo $rows['id'] ?>&query=sua">Sửa</a> </td>
    <?php
    }?>

  </tr>
</table>
</section>
</section>