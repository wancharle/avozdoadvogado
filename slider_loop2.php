<?php 
$values = get_post_custom($post->ID);
?>

    <li style="display:none"; data-transition="<?=$values["kenburn_transition"][0]?>"> 										

<?php 
    if ($values["kenburn_use_destaque"][0] =="on"){
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'post-thumbnails');
    ?>
        <img  src="<?=$src[0]?>" alt="">
    <?php }else { ?>
        <img  src="<?=$values['kenburn_image'][0];?>" alt="">
        <div class="caption fade" data-x="0" data-y="0" data-speed="400" data-start="800"><?php the_post_thumbnail("slider");?></div>
<?php } 

    // legendas 
     if (($video = get_videointerno())!=''){?>

        <div class="caption lfb boxshadow" data-x="10" data-y="80" data-speed="900" data-start="1300" data-easing="easeOutBack">
            <?php       echo $video ?>
        </div>
     <?php   }
     if ($values["leg1"][0] !="off"): ?>
   
        <div class="caption <?=$values["leg1"][0]?> <?=$values["leg1f"][0]?>" data-x="<?=$values["leg1x"][0]?>" data-y="<?=$values["leg1y"][0]?>" data-speed="600" data-start="800" data-easing="easeOutBack"><a href="<?the_permalink();?>"><?php the_title(); ?></a></div>
<?php endif;
  if( isset($values["nef"])){
    $nef = unserialize($values["nef"][0]);
    foreach ($nef as $i):?>
    <div class="caption texto <?=$values["tipo".$i][0]?>" style="font-size:<?=$values["size".$i][0]?>px ;color:<?=$values["cor".$i][0]?>;background-color: <?=$values["cor_fundo".$i][0]?>" data-x="<?=$values["x".$i][0]?>" data-y="<?=$values["y".$i][0]?>" data-speed="<?=$values["speed".$i][0]?>" data-start="<?=$values["start".$i][0]?>" >

<?php 
    $aplicar = $values["aplicar".$i][0];
    switch ($aplicar){
        case 1:echo "<a href='";the_permalink();echo "'>";the_title();echo "</a>";break;
        case 2:the_excerpt();break;
        case 3:the_post_thumbnail();break;
        case 4: echo html_entity_decode($values["extra".$i][0]);break;
        case 5: echo "<img src='".$values["extra".$i][0]."' />"; break; 
        case 6: echo "<a href='";the_permalink();echo "'>".$values["extra".$i][0]."</a>";break;
    };

    echo "</div>";


    endforeach;
}  
?>
    </li>

