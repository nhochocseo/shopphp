<div class="list-group">
    <div class="title">Giỏ Hàng !</div>
    <div class="list-group-item"><strong>Bạn có <span id="Carts2"><?php if(isset($_SESSION["NumberCart"])){ echo $_SESSION["NumberCart"]; }else{echo "0";} ?></span> sản phẩm</strong>
    </div>
    <div class="list-group-item">Tổng tiền
        <span class="label bg-danger pull-right" id="TotalPrice"><?php echo number_format($TotalPrice);?> VNĐ</span>
    </div>
    <div class="list-group-item">
        <span class="pull-right"><a href="javascript:;" onclick="return Delete_Cart();"><span class="btn btn-danger btn-sm">Xóa Giỏ Hàng</span></a></span>
        <div class="clearfix"></div>
    </div>
</div>
<div class="list-group">
    <?php
        $categories=$this->Category->ListCompany();
         // HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
        function showCategories($categories, $parent_id = 0, $active = ' active')
        {
            foreach ($categories as $item)
            {
                // Nếu là chuyên mục con thì hiển thị
                if ($item->Parent_Id == $parent_id)
                {
                    echo '<a href="'.home.'?pages=category&id='.$item->Id.'" class="list-group-item'.$active.'">'. $item->Category_Name. '</span></a>';
                    // Xóa chuyên mục đã lặp
                    unset($categories->$item);    
                    // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                    showCategories($categories, $item->Id, $active.'no');
                }
            }
        }
    ?>
        <?php showCategories($categories); ?>
</div>
<iframe src="//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/icytheme/&amp;width=270&amp;height=230&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=804766489562981" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:230px;" allowTransparency="true"></iframe>

