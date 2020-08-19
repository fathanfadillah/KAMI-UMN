<?php $this->load->helper('string') ?>

<table class="table table-bordered">

    <tr>
        <th>Judul Event</th>
        <th>Deskripsi Event</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Berakhir</th>
        <th>Opsi</th>
    </tr>

<?php foreach ($events as $event): ?>

    <tr>
        <td><?php echo $event['header'] ?></td>
        <td>
            <div style="max-height: 6em; overflow: auto; max-width: 30em;">
                <?php echo $event['description'] ?>
            </div>
        </td>
        <td><?php echo date('d F Y', strtotime($event['start_date'])) ?></td>
        <td><?php echo date('d F Y', strtotime($event['end_date'])) ?></td>
        <td>
            <a href="<?php echo base_url('events/'.$event['slug']) ?>" class="btn btn-sm btn-primary">View</a>
            <a href="<?php echo base_url('admin/events/'.$event['slug']) ?>" class="btn btn-sm btn-success">Edit</a>
            <?php echo $this->load->view('events/_modal_delete', array('event' => $event), TRUE) ?>
        </td>
    </tr>

<?php endforeach; ?>

</table>

<nav><?php echo $pagination ?></nav>
