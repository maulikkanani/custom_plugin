<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
//global $image_category;
?>

<div class="col-xs-12 col-sm-4 single-image-layers">
    <?php
        
         $default_attrs=  json_encode($current_items);
         $file = wca_get_template_path('cart-image-layer.php');
        include $file;
         //pr($current_items);
     ?>
</div>

<div class="col-xs-12 col-sm-8 single-attr-det">
    <div id="product_preview">
        <div class="extras_product_preview">
            <div class="extras_product_preview_box">
                <div class="fabric_left">
                    <h2>Fabric</h2>
                    <!-- Start cloth -->
                    <div class="fabric_box man_trenchcoat">
                        <?php $fabric = $current_items['wca_trenchcoat_fabric_type']; ?> 
                        <div class="cloth_preview marge_inf">
                            <img src="<?php echo $image_category . '/fabric/' . $fabric ?>/thumb.jpg" height="180" width="180" title="Newport" />
                        </div>
                        <div class="fabric_description">
                            <h3 class="marge_inf">Newport</h3>
                            <div class="info">
                                <div class="marge_inf">
                                    <span class="label">Composition </span> <span class="value"> 52% cotton &amp; 48% polyester</span>
                                </div>
                                <!-- TEMPORADA -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="extras_right">
                    <h2>Options</h2>
                    <div class="extra_box det_lining">
                        <?php $lining = $current_items['wca_trenchcoat_interior_type']; ?>
                        <div class="extra_description">
                            <span>Lining</span>
                        </div>
                        <?php $linings = $current_items['wca_trenchcoat_interior']; ?>
                            <div class="extra_img">
                                <img src="<?php echo $image_category . '/linings/' . $linings ?>/thumb.jpg" height="180" width="180" />
                            </div>
                    </div>
                    <div class="extra_box det_embroidery">
                        <div class="extra_description"> Embroiders : </div>
                        <div class="extra_img"><?php echo $current_items['wca_embroidery_text']; ?></div>
                        <div class="extra_description">Font Selected : </div>
                                    <?php
                                    if ($current_items['wca_trenchcoat_embroidery_font'] == "1") {
                                        $img = "19";
                                    } elseif ($current_items['wca_trenchcoat_embroidery_font'] == "2") {
                                        $img = "24";
                                    } elseif ($current_items['wca_trenchcoat_embroidery_font'] == "3") {
                                        $img = "74";
                                    } elseif ($current_items['wca_trenchcoat_embroidery_font'] == "4") {
                                        $img = "77";
                                    }
                                    ?>
                        <div class="extra_img">
                            <img src="<?php echo $man_url . '/initials/' . $img ?>.png">
                        </div>
                        <!-- prespunte/stitching -->
                    </div>

<?php if ($current_items['wca_button_hilo_ojal'] == "1") { ?>
                        <div class="extra_box">
                            <p class="common_extra_title">Threads / button holes</p>
                            <div class="extra_description marge_inf">
                                <p><span>Button threads color</span></p>
                            </div>
    <?php $button_thread = $current_items['wca_buton_thread']; ?>
                            <div class="extra_img marge_inf">
                                <img src="<?php echo $image_category . '/hilo/' . $button_thread ?>/hilo_icon.jpg">
                            </div>
                            <div class="extra_description">
                                <p><span>Button holes color</span></p>
                            </div>
    <?php $button_thread = $current_items['wca_buton_hole_thread']; ?>
                            <div class="extra_img">
                                <img src="<?php echo $image_category . '/ojal/' . $button_thread ?>/ojal_icon.jpg">
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Personalizar puños/cuffs_fabric -->
<?php $neck_lapel = $current_items['wca_trenchcoat_neck_lapel']; ?>
                    <div class="extra_box">
                        <div class="extra_description">
                            <span>Neck Lining</span>
                        </div>
                        <?php if ($neck_lapel = 0) { ?>
                            <span class="value">No Neck Lining</span>
                        <?php } else {
                            $neck_lining = $current_items['wca_neck_lining'];
                            ?>
                            <div class="extra_img">
                                <img src="<?php echo $image_category . '/neck_lining/' . $neck_lining ?>/neck_lining_icon.jpg">
                            </div>
                    <?php } ?>
                    </div>
<?php $elbow_patch = $current_items['wca_trenchcoat_elbow_patch']; ?>
                    <div class="extra_box">
                        <div class="extra_description">
                            <span>Elbow patches</span>
                        </div>
                        <?php if ($elbow_patch == 0) { ?>
                            <span class="value">No Elbow Patches</span>
<?php } else {
    $patches = $current_items['wca_elbow_patch'];
    ?>
                            <div class="extra_img">
                                <img src="<?php echo $image_category . '/patches/' . $patches ?>/elbow_patches_icon.jpg">
                            </div>
<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="detalles_product_preview">
        <h2>Details:</h2>
        <table class="detalles_product_preview">
            <tbody>
                <tr>
                    <td>
                        <ul>
                            <li>
                                <span class="label">Coat length:</span>
                                <span class="value"><?php echo wca_retrieve_label('wca_trenchcoat_length', $current_items['wca_trenchcoat_length']); ?></span>
                            </li>
                            <li>
                                <span class="label">Style:
                                </span>			
                                <span class="value"><?php echo wca_retrieve_label('wca_trenchcoat_style', $current_items['wca_trenchcoat_style']); ?></span>
                            </li>
                            <li>
                                <span class="label">Fit:
                                </span>			
                                <span class="value"><?php echo wca_retrieve_label('wca_trenchcoat_fit', $current_items['wca_trenchcoat_fit']); ?></span>
                            </li>
                            <li>
                                <span class="label">Fastening:
                                </span>			
                                <span class="value"><?php echo wca_retrieve_label('wca_trenchcoat_closure', $current_items['wca_trenchcoat_closure']); ?></span>
                            </li>
                            <li>
                                <span class="label">Button fastening:
                                </span>			
                                <span class="value"><?php echo wca_retrieve_label('wca_trenchcoat_closure_type_boton', $current_items['wca_trenchcoat_closure_type_boton']); ?></span>
                            </li>
                            <li>
                                <span class="label">Chest pocket:
                                </span>			
                                <span class="value"><?php echo wca_retrieve_label('wca_trenchcoat_chest_pocket', $current_items['wca_trenchcoat_chest_pocket']); ?></span>
                            </li>
                            <li>
                                <span class="label">Pockets:
                                </span>			
                                <span class="value"><?php echo wca_retrieve_label('wca_trenchcoat_pockets', $current_items['wca_trenchcoat_pockets']); ?></span>
                            </li>
                            <li>
                                <span class="label">Pocket type:
                                </span>			
                                <span class="value"><?php echo wca_retrieve_label('wca_trenchcoat_pockets_type', $current_items['wca_trenchcoat_pockets_type']); ?></span>
                            </li>
                            <li>
                                <span class="label">Sleeves:
                                </span>			
                                <span class="value"><?php echo wca_retrieve_label('wca_trenchcoat_sleeve', $current_items['wca_trenchcoat_sleeve']); ?></span>
                            </li>
                            <li>
                                <span class="label">Epaulettes:
                                </span>			
                                <span class="value"><?php echo wca_retrieve_label('wca_trenchcoat_shoulder', $current_items['wca_trenchcoat_shoulder']); ?></span>
                            </li>
                            <li>
                                <span class="label">Belt:
                                </span>			
                                <span class="value"><?php echo wca_retrieve_label('wca_trenchcoat_belt', $current_items['wca_trenchcoat_belt']); ?></span>
                            </li>
                            <li>
                                <span class="label">Back side:
                                </span>			
                                <span class="value"><?php echo wca_retrieve_label('wca_trenchcoat_backcut', $current_items['wca_trenchcoat_backcut']); ?></span>
                            </li>
                            <li>
                                <span class="label">Back piece:
                                </span>			
                                <span class="value"><?php echo wca_retrieve_label('wca_trenchcoat_back_lapel', $current_items['wca_trenchcoat_back_lapel']); ?></span>
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
