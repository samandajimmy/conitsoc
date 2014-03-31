
<div class="container">

    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="product-name">
                    Find Any Certification Here
                </div>
                <ul class="artikel_item clearfix">
                    <?php
                    if (isset($certification)) {
                        foreach ($certification as $certification) {
                            $text = rtrim($certification->isi, ', ');
                            // strip tags to avoid breaking any html
                            $texts = strip_tags($text);

                            if (strlen($texts) > 231) {

                                // truncate string
                                $stringCut = substr($texts, 0, 231);

                                // make sure it ends in a word so assassinate doesn't become ass...
                                $text = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...';
                            }
                            ?>
                            <li class="span4 clearfix">
                                <div class="thumbnail">
                                    <a href="<?php echo site_url('page/detail_certification/' . $certification->id); ?>"><img src="<?php echo base_url('certification/gambar/' . $certification->gambar); ?>" alt=""></a>
                                </div>
                                <div class="thumbSetting">
                                    <div class="thumbTitle">
                                        <a href="<?php echo site_url('page/detail_certification/' . $certification->id); ?>" class="invarseColor">
                                            <?php echo $certification->judul; ?>
                                        </a>
                                        <p>Article</p>
                                    </div>
                                    <div class="desc">
                                        <p>
                                            <?php echo $text; ?>
                                        </p>
                                    </div>
                                    <div class="readmore pull-right">
                                        <a href="<?php echo site_url('page/detail_certification/' . $certification->id); ?>" class="btn btn-success">Read More >></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="pagination pagination-right">
                <span class="pull-left">Showing 9 of 20 pages:</span>
                <?php echo isset($certification) ? $links : '' ?>
            </div>

        </div>
    </div><!--end row-->
</div><!--end featuredItems--> 
