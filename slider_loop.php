<?php 
$values = get_post_custom($post->ID);
?>

    <li style="display:none"; data-transition="<?=$values["kenburn_transition"][0]?>" data-slotamount="10"> 										

<?php 
    if ($values["kenburn_use_destaque"][0] =="on"){
        the_post_thumbnail();
    }else {
?>
        <img  src="<?=$values['kenburn_image'][0];?>" alt="">
        
        <div class="caption fade" data-x="0" data-y="0" data-speed="400" data-start="800"><?php the_post_thumbnail("slider");?></div>
<?php } 

    // legendas 
     if (($video = get_videointerno())!=''){?>

        <div class="caption lfb boxshadow" data-x="20" data-y="80" data-speed="900" data-start="1300" data-easing="easeOutBack">
            <?php       echo $video ?>
        </div>
     <?php   }
     if ($values["leg1"][0] !="off"): ?>
   
        <div class="caption <?=$values["leg1"][0]?> <?=$values["leg1f"][0]?>" data-x="<?=$values["leg1x"][0]?>" data-y="<?=$values["leg1y"][0]?>" data-speed="600" data-start="800"><?php the_title(); ?></div>
<?php endif;
    

?>
    </li>

