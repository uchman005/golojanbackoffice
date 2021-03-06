<!-- Wallet Card -->
<div class="section mt-5">
    <div class="wallet-card">
        <!-- Balance -->
        <div class="balance">
            <div class="left">
                <span class="title">Available Warehouse Capacity</span>
                <h1 class="total" id="xStoreTotal"><?= $Core->Monify($Core->AvailableWareHouseStock($UserInfo->accid)) ?></h1>
            </div>
            <div class="right">
                <a href="#" class="button" id="xStoreCount"><?= $Core->CountWarehouseStock($UserInfo->accid) ?></a>
            </div>
        </div>
        <!-- * Balance -->
        <!-- Wallet Footer -->
        <div class="wallet-footer row">
            <div class="form-group col-12">
                <h3 class="title col-12">Select Your Category</h3>
                <select class="form-control" style="width: 100%;" id="LoadWarehouseCategories">
                    <?= $Core->LoadMyCategories($UserInfo->accid,$category) ?>
                </select>
            </div>
        </div>
        <!-- * Wallet Footer -->
    </div>
</div>
<!-- Wallet Card -->

<div class="section mt-2 mb-2">

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STOCK LIST</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($product = mysqli_fetch_object($MyProducts)) :
                    $Category = $Core->CategoryInfo($product->category);  ?>
                    <tr>
                        <th scope="row">
                            <ul class="listview image-listview text inset">
                                <li>
                                    <a href="#" class="item">
                                        <div class="media left mr-2">
                                            <img style="width:100px" src="<?= $product->photo ?>">
                                        </div>
                                        <div class="in right">
                                            <div><?= $product->name ?></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="item">
                                        <div class="in">
                                            <div>
                                                <strong><?= $Core->ToMoney($product->selling) ?></strong>
                                                <div class="text-muted">
                                                    <?= $Category->category ?>
                                                </div>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="<?= $product->id ?>" class="custom-control-input AddToMyWarehouseBtn" value="<?= $product->id ?>" id="<?= $product->id ?>" <?= $Core->RunWarehouseSwitch($product->id,$UserInfo->accid);  ?> />
                                                <label class="custom-control-label" for="<?= $product->id ?>"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </th>
                    </tr>

                <?php endwhile; ?>

            </tbody>
        </table>
    </div>

</div>