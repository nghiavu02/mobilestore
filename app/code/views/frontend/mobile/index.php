<div class="container" style="margin: 50px 0;">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="fontsize: 20px;">
            <form method="post" action=""enctype="multipart/form-data">
                <select name="mobile" id="mobile" style="height: 30px; width: 400px;">
                    <?php foreach ($mobile as $mb) : ?>
                        <option value="<?php echo $mb['idMobile'] ?>">
                            <?php echo $mb['idMobile'] . ".  " . $mb['tenDienThoai'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                &emsp;&emsp;&emsp;
                <input type="checkbox" name="logo" style="width: 30px; height: 30px; cursor: pointer;">Is Logo ?</input>
                <br><br>
                <input type="file" name="image" />
                <br><br>
                <input type="submit" name="upload" value="Upload" />
            </form>
        </div>
    </div>
</div>
