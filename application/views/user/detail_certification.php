
<div class="container">
    <?php
    $certification = $detail_certification[0];
    ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="product-name">
                <?php echo $certification->judul; ?>
            </div>
        </div>
    </div><!--end row-fluid-->
    <div class="row-fluid">
        <div class="span9">

            <article class="blog-article">
                <div class="blog-img">
                    <img src="<?php echo base_url('certification/' . $certification->gambar); ?>" alt="Blog image">
                </div><!--end blog-img-->

                <div class="blog-content">
                    <div class="blog-content-title">
                        <h2><a href="" class="invarseColor"><?php echo $certification->judul; ?></a></h2>
                    </div>
                    <div class="blog-content-entry">
                        <p>
                            <?php echo $certification->isi; ?>
                        </p>
                    </div>
                </div><!--end blog-content-->
            </article><!--end article-->

        </div>
    </div><!--end row-fluid-->
</div><!--end featuredItems--> 
