
<table class="table table-hover">
      <thead>
        <tr>
          <th>名称</th>
          <th>分类级别</th>
          <th>当前id</th>
          <th>父级id</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($data as $row) {      ?>
        <tr>
          <th><span style="margin-left:<?php echo ($row['level']-1)*30 ?>px"><?php echo $row['cname'] ?></span></th>
          <td><?php echo $row['note'] ?></td>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['parentId'] ?></td>
        </tr>
        <?php } ?>
      </tbody>
</table>

