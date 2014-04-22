
<div class="container">

    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <div class="product-name">
                    Find Any Solution Here
                </div>
                <ul class="artikel_item clearfix">
                    <?php
                    if (isset($artikel)) {
                        foreach ($artikel as $key => $artikel) {
                            $first = $key % 3 == 0 ? 'first' : '';
                            $text = rtrim($artikel->isi, ', ');
                            // strip tags to avoid breaking any html
                            $texts = strip_tags($text);

                            if (strlen($texts) > 231) {

                                // truncate string
                                $stringCut = substr($texts, 0, 231);

                                // make sure it ends in a word so assassinate doesn't become ass...
                                $text = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...';
                            }
                            ?>
                            <li class="span4 clearfix <?php echo $first; ?>">
                                <div class="thumbnail">
                                    <a href="<?php echo site_url('page/detail_artikel/' . $artikel->id); ?>"><img src="<?php echo base_url('artikel/gambar/' . $artikel->gambar); ?>" alt=""></a>
                                </div>
                                <div class="thumbSetting">
                                    <div class="thumbTitle">
                                        <a href="<?php echo site_url('page/detail_artikel/' . $artikel->id); ?>" class="invarseColor">
                                            <?php echo $artikel->judul; ?>
                                        </a>
                                        <p>Article</p>
                                    </div>
                                    <div class="desc">
                                        <p>
                                            <?php echo $text; ?>
                                        </p>
                                    </div>
                                    <div class="readmore pull-right">
                                        <a href="<?php echo site_url('page/detail_artikel/' . $artikel->id); ?>" class="btn btn-success">Read More >></a>
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
                <?php echo isset($artikel) ? $links : '' ?>
            </div>

        </div>
    </div><!--end row-->
</div><!--end featuredItems--> 
