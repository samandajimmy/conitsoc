<div class="container">
    <?php
    $artikel = $detail_artikel[0];
    ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="product-name">
                <?php echo $artikel->judul; ?>
            </div>
        </div>
    </div><!--end row-fluid-->
</div>

<div class="body">
    <div class="container">
        <div class="row-fluid" style="background: white">
            <div class="span9">

                <article class="blog-article">
                    <div class="blog-img">
                        <img src="<?php echo base_url('artikel/' . $artikel->gambar); ?>" alt="Blog image">
                    </div><!--end blog-img-->

                    <div class="blog-content">
                        <div class="blog-content-title">
                            <h2><a href="" class="invarseColor"><?php echo $artikel->judul; ?></a></h2>
                        </div>
                        <div class="blog-content-entry">
                            <p style="text-align: justify">
                                <?php echo $artikel->isi; ?>
                            </p>
                        </div>
                    </div><!--end blog-content-->
                </article><!--end article-->

            </div>
        </div><!--end row-fluid-->
    </div><!--end featuredItems--> 
</div>
