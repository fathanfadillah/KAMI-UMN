<?php
    $this->lang->load('form_news');

    $data = array(
        'header' => array(
            'label' => $this->lang->line('form_news_label_header'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'header',
                    'placeholder' => $this->lang->line('form_news_placeholder_header'),
                    'value' => set_value('header', isset($header) ? $header : null),
                )
            )
        ),
        'sub_header' => array(
            'label' => $this->lang->line('form_news_label_sub_header'),
            'control' => array(
                array(
                    'type' => 'text',
                    'name' => 'sub_header',
                    'placeholder' => $this->lang->line('form_news_placeholder_sub_header'),
                    'value' => set_value('sub_header', isset($sub_header) ? $sub_header : null),
                )
            )
        ),
        'published_date' => array(
            'label' => $this->lang->line('form_news_label_published_date'),
            'control' => array(
                array(
                    'type' => 'date',
                    'name' => 'published_date',
                    'value' => set_value('published_date', isset($published_date) ? $published_date : Date('Y-m-d')),
                )
            )
        ),'content' => array(
            'label' => $this->lang->line('form_news_label_content'),
            'control' => array(
                array(
                    'id' => "ckeditor",
                    'type' => 'textarea',
                    'name' => 'content',
                    'placeholder' => $this->lang->line('form_news_placeholder_content'),
                    'value' => html_entity_decode(set_value('content', isset($content) ? $content : null)),
                )
            )
        ), 'main_photo' => array(
            'label' => $this->lang->line('form_news_label_main_photo'),
            'control' => array(
                array(
                    'type' => 'upload',
                    'name' => 'main_photo',
                    'value' => '',
                ),
            )
        ), 'side_photo_1' => array(
            'label' => $this->lang->line('form_news_label_side_photo_1'),
            'control' => array(
                array(
                    'type' => 'upload',
                    'name' => 'side_photo_1',
                    'value' => '',
                ),
            )
        ), 'side_photo_2' => array(
            'label' => $this->lang->line('form_news_label_side_photo_2'),
            'control' => array(
                array(
                    'type' => 'upload',
                    'name' => 'side_photo_2',
                    'value' => '',
                ),
            )
        ), 'side_photo_3' => array(
            'label' => $this->lang->line('form_news_label_side_photo_3'),
            'control' => array(
                array(
                    'type' => 'upload',
                    'name' => 'side_photo_3',
                    'value' => '',
                ),
            )
        ),
    );
?>
<?php echo form_open_multipart('news/edit/'.$slug, 'class="form form-horizontal"'); ?>

    <fieldset>
    <?php foreach ($data as $formgroup => $item): ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $item['label']; ?></label>
        <?php foreach ($item['control'] as $control => $subitem): ?>
            <div class="col-md-8">
                <?php if ($subitem['type'] == 'dropdown'): ?>
                    <?php echo form_dropdown($subitem['name'], $subitem['options'], $subitem['selected'], 'class="form-control"'); ?>
                <?php elseif ($subitem['type'] == 'textarea'): ?>
                    <?php echo form_textarea($subitem, '', 'class="form-control"'); ?>
                <?php elseif ($subitem['type'] == 'upload'): ?>
                    <?php echo form_upload($subitem, '', 'class="form-control"'); ?>
                <?php else: ?>
                    <?php echo form_input($subitem, '', 'class="form-control"'); ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

        <div class="form-group">
            <div class="col-md-offset-3 col-md-6">
                <?php echo form_submit('news/edit', $this->lang->line('form_news_save'), 'class="btn btn-lg btn-success btn-block"'); ?>
            </div>
        </div>
    </fieldset>

<?php echo form_close(); ?>
