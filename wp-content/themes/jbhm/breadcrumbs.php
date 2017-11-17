<?php

  $queriedObject = get_queried_object();


  // print_r($queriedObject);


 ?>

 <?php if ( is_page( 'projects' ) ) : ?>
   <nav aria-label="breadcrumb" role="navigation">
     <ol class="breadcrumb">
       <li class="breadcrumb-item"><a href="../projects"><?php echo $queriedObject->post_title; ?></a></li>
       <li class="breadcrumb-item active" aria-current="page">Industries</li>
     </ol>
  </nav>
 <?php elseif ( is_page() ) : ?>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><?php echo $queriedObject->post_title; ?></li>
      </ol>
   </nav>
 <?php endif; ?>


<?php if ( is_single() && ! is_page() ) :?>

  <?php $post_type = $queriedObject->post_type; ?>


   <nav aria-label="breadcrumb" role="navigation">
     <ol class="breadcrumb">

       <?php if ( $post_type == 'project' ) : ?>

         <?php $term = get_terms( array(
           'taxonomy' => 'industries'
         ));
         // print_r( $queriedObject); ?>

         <li class="breadcrumb-item"><a href="../projects">Projects</a></li>

         <?php if ( isset( $_GET['t'] ) ) : ?>
           <li class="breadcrumb-item">
             <?php if (  $_GET['t'] == 'i' ) : ?>
               <?php $tax = 'industries'; ?>
              <a href="<?php bloginfo('url'); ?>/projects">Industries</a>
             <?php elseif ( $_GET['t'] == 's' ) : ?>
               <?php $tax = 'services'; ?>
               <a href="<?php bloginfo('url'); ?>/services">Services</a>
             <?php endif; ?>
           </li>
         <?php endif; ?>

         <?php if ( isset( $_GET['o'] ) ) : ?>
           <?php $termID = $_GET['o']; ?>
           <?php $term = get_term_by( 'id', $termID, $tax ); ?>
           <?php //print_r($term); ?>
           <li class="breadcrumb-item">
              <a href="<?php echo get_term_link( $term->term_id, $term->taxonomy ); ?>"><?php echo $term->name; ?></a>
           </li>
         <?php endif; ?>

       <?php elseif ( $post_type == 'post' ) : ?>
         <li class="breadcrumb-item"><a href="../news">News</a></li>
      <?php elseif ( $post_type == 'person' ) : ?>
        <li class="breadcrumb-item"><a href="../people">People</a></li>
      <?php endif; ?>

      <li class="breadcrumb-item active" aria-current="page"><?php echo $queriedObject->post_title; ?></li>


       <!-- <li class="breadcrumb-item active" aria-current="page">This is a single post for post-type:  </li> -->

     </ol>
  </nav>
<?php endif; ?>

<?php


?>


<?php if ( is_tax() ) : ?>

  <?php
    $taxonomy = $queriedObject->taxonomy;
    $taxObject = get_taxonomy( $taxonomy );
    $display_tax = $taxObject->label;
    $display_term = $queriedObject->name;
// print_r($taxObject);
  ?>

  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php bloginfo( 'url' ); ?>/projects">
          Projects
        </a>
      </li>
      <li class="breadcrumb-item">
        <a href="<?php bloginfo( 'url' ); ?>/projects">
          <?php echo $display_tax; ?>
        </a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        <?php echo $display_term; ?>
      </li>
    </ol>
  </nav>
<?php endif; ?>
