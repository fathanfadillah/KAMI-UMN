<?php $this->load->helper('string') ?>

<table class="table table-striped table-bordered">

    <tr>
        <th>Judul Berita</th>
        <th>Isi Berita</th>
        <th>Penulis</th>
        <th>Tanggal Perubahan</th>
        <th>Tanggal Publish</th>
        <th>Opsi</th>
    </tr>

<?php foreach ($news as $news_item): ?>

    <tr>
        <td><?php echo $news_item['header'] ?></td>
        <td><?php echo substr($news_item['content'], 0, 60) ?></td>
        <td><?php echo $news_item['author'] ?></td>
        <td><?php echo date('j M Y', strtotime($news_item['last_update'])) ?></td>
        <td><?php echo date('j M Y', strtotime($news_item['published_date'])) ?></td>
        <td>
            <div>
                <a href="<?php echo base_url('news/'.$news_item['slug']) ?>" class="btn btn-primary">View</a>
            </div>
            <div>
                <a href="<?php echo base_url('news/edit/'.$news_item['slug']) ?>" class="btn btn-success">Edit</a>
            </div>
            <div>
                <?php echo $this->load->view('news/_modal_delete', array('news' => $news_item), TRUE) ?>
            </div>
        </td>
    </tr>

<?php endforeach; ?>

</table>

<nav><?php echo $pagination ?></nav>
