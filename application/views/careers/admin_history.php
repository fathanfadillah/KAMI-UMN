<?php
/**
 * @param careers: array of career
**/
?>

<div class="table-responsive" style="padding-bottom: 100px">
    <table class="table table-striped table-hover" id="dataTable" data-order="[[ 4, &quot;desc&quot; ]]">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Nama Perusahaan</th>
                <th>Tanggal Deadline</th>
                <th>
                    Tanggal Perubahan
                </th>
                <th>...</th>
            </tr>
        </thead>
        <tbody>
            <?php $id = 0 ?>
            <?php foreach($careers as $career): ?>
                <?php $id = $id + 1 ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $career['header'] ?></td>
                    <td><?php echo $career['company_name'] ?></td>
                    <td><?php echo $career['end_date'] ?></td>
                    <td><?php echo $career['last_update'] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail-<?php echo $career['id'] ?>">
                            View
                        </button>

                        <div class="modal fade" id="detail-<?php echo $career['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="detail-<?php echo $career['id'] ?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="detail-<?php echo $career['id'] ?>"><?php echo $career['header'] ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <h3><?php echo $career['header'] ?></h3>
                                        <h4><?php echo $career['company_name'] ?></h4>

                                        <?php if (isset($career['description'])): ?>

                                        <p><?php echo html_entity_decode($career['description']) ?></p>

                                        <?php endif; ?>

                                        <?php if (isset($career['document'])): ?>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <a href="<?php echo base_url('assets/images/careers/'.$career['document']) ?>">
                                                  <img class="img-responsive" src="<?php echo base_url('assets/images/careers/'.$career['document']) ?>" alt="...">
                                                </a>
                                            </div>
                                        </div>

                                        <?php endif; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
