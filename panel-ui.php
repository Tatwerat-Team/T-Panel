<?php

//#-> TPanel UI

function panelUI($panel) {

    $row_ID = '';
    $row_class = '';
    if (isset($panel['ID'])) {
        $row_ID = ' ' . 'id="' . $panel['ID'] . '" ';
    }
    if (isset($panel['row_class'])) {
        $row_class = ' ' . 'class="' . $panel['row_class'] . '" ';
    }

    switch ($panel['type']) {

        case 'loop':
            $data = [];
            $count = 1;
            if (isset($panel['count'])) {
                $count = $panel['count'];
            }
            for ($x = 1; $x <= $count; $x++) {
                $data[$x] = $x;
            }
            return $data;
            break;

        case 'tab-menu':
            $submenu = '';
            $ID = '';
            $icon = '';
            if (isset($panel['ID'])) {
                $ID = 'data-tab="' . $panel['ID'] . '"';
            }
            if (isset($panel['submenu']) and ! empty($panel['submenu'])) {
                $icon .= '<b class="fa fa-angle-down"></b>';
                $submenu .= '<ul>';
                foreach ($panel['submenu'] as $key => $value) {
                    $submenu .= '<li><a data-tab="' . $key . '">' . $value . '</a></li>';
                }
                $submenu .= '</ul>';
            }
            return '<li>' . $icon
                    . '<a ' . $ID . '><i class="fa ' . $panel['icon'] . '"></i> ' . $panel['label'] . '</a><span></span>' .
                    $submenu
                    . '</li>';
            break;

        case 'start-section':
            $ID = '';
            if (isset($panel['ID'])) {
                $ID = 'id="' . $panel['ID'] . '"';
            }
            return '<div class="panel-tab" ' . $ID . '>';
            break;

        case 'end-section':
            return '</div>';
            break;

        case 'start-block':
            return '<div class="panel-block"' . $row_ID . '>
                        <div class="block-head"><h2>' . $panel['title'] . '</h2> <i class="fa fa-sort-down"></i></div>
                        <div class="block-body">
                            <table>
                                <tbody>';
            break;

        case 'end-block':
            return '
                                </tbody>
                            </table>
                        </div>
                    </div>';
            break;

        case 'tab-body':
            $ID = '';
            if (isset($panel['ID'])) {
                $ID = 'id="' . $panel['ID'] . '"';
            }
            return '<div class="panel-tab" ' . $ID . '>' . $panel['panel-block'] . '</div>';
            break;

        case 'panel-block':
            return '<div class="panel-block"' . $row_ID . '>
                        <div class="block-head"><h2>' . $panel['title'] . '</h2> <i class="fa fa-sort-down"></i></div>
                        <div class="block-body">
                            <table>
                                <tbody>
                                    ' . $panel['content'] . '
                                </tbody>
                            </table>
                        </div>
                    </div>';
            break;

        case 'break':
            return '<tr' . $row_ID . '>
                     <td colspan="2"><hr /></td>
                 </tr>';
            break;

        case 'textbox':
            $panel_max = '';
            $panel_placeholder = '';
            if (isset($panel['max'])) {
                $panel_max = $panel['max'];
            }

            if (isset($panel['placeholder'])) {
                $panel_placeholder = $panel['placeholder'];
            }
            return '<tr' . $row_ID . '>
                     <td><label for="' . $panel['name'] . '">' . $panel['label'] . '</label></td>
                     <td><input type="text" name="' . $panel['name'] . '" id="' . $panel['name'] . '" value="' . $panel['value'] . '" placeholder="' . $panel_placeholder . '" maxlength="' . $panel_max . '"></td>
                 </tr>';
            break;

        case 'textarea':
            return '<tr' . $row_ID . '>
                     <td><label for="' . $panel['name'] . '">' . $panel['label'] . '</label></td>
                     <td><textarea name="' . $panel['name'] . '" id="' . $panel['name'] . '">' . stripcslashes($panel['value']) . '</textarea></td>
                 </tr>';
            break;

        case 'upload-files':
            $panel_placeholder = '';
            if (isset($panel['placeholder'])) {
                $panel_placeholder = 'placeholder="' . $panel['placeholder'] . '"';
            } else {
                $panel_placeholder = 'placeholder="http://"';
            }
            return '<tr' . $row_ID . '>
                     <td><label for="' . $panel['name'] . '">' . $panel['label'] . '</label></td>
                     <td>
                        <div class="panel-upload single">
                           <input type="text" name="' . $panel['name'] . '" id="' . $panel['name'] . '" value="' . $panel['value'] . '" style="direction:ltr;" ' . $panel_placeholder . '>
                           <button type="button" data-id="#' . $panel['name'] . '" data-title="' . esc_html__('Upload File', 'kud') . '" data-value="' . esc_html__('add file', 'kud') . '"><i class="fa fa-upload"></i> ' . esc_html__('upload', 'kud') . '</button>
                        </div>
                    </td>
                 </tr>';
            break;

        case 'upload-single':
            $img = '';
            if (!empty($panel['value'])) {
                $img = '<img src="' . $panel['value'] . '" alt=""><a class="img-remove"><i class="fa fa-times"></i></a>';
            } else {
                $img = '<img src="' . $panel['value'] . '" style="display:none;" alt=""><a class="img-remove" style="display:none;"><i class="fa fa-times"></i></a>';
            }
            return '<tr' . $row_ID . '>
                     <td><label for="' . $panel['name'] . '">' . $panel['label'] . '</label></td>
                     <td>
                        <div class="panel-upload single">
                           <input type="text" name="' . $panel['name'] . '" id="' . $panel['name'] . '" value="' . $panel['value'] . '" style="direction:ltr;" placeholder="http://">
                           <button type="button" data-id="#' . $panel['name'] . '" data-title="' . esc_html__('Upload File', 'kud') . '" data-value="' . esc_html__('add file', 'kud') . '"><i class="fa fa-upload"></i> ' . esc_html__('upload', 'kud') . '</button>
                           ' . $img . '
                        </div>
                    </td>
                 </tr>';
            break;

        case 'upload-multiple':
            $remove_link = '';
            if (!empty($panel['value'])) {
                $remove_link = '<a class="img-remove"><i class="fa fa-times"></i> ' . esc_html__('remove all', 'kud') . '</a>';
            } else {
                $remove_link = '<a class="img-remove" style="display:none"><i class="fa fa-times"></i> ' . esc_html__('remove all', 'kud') . '</a>';
            }
            return '<tr' . $row_ID . '>
                     <td><label for="' . $panel['name'] . '">' . $panel['label'] . '</label></td>
                     <td>
                        <div class="panel-upload multiple">
                           <input type="text" name="' . $panel['name'] . '" id="' . $panel['name'] . '" value="' . $panel['value'] . '" style="direction:ltr;" placeholder="http://">
                           <button type="button" data-id="#' . $panel['name'] . '" data-title="' . esc_html__('Upload File', 'kud') . '" data-value="' . esc_html__('add file', 'kud') . '"><i class="fa fa-upload"></i> ' . esc_html__('upload', 'kud') . '</button>
                           <div class="panel-photos"></div>
                           ' . $remove_link . '
                        </div>
                    </td>
                 </tr>';
            break;

        case 'chose-icons':
            $icons_1 = tpanel_custom_icons();
            $icons_2 = tpanel_fontawesome();
            $custom_icon = '';
            $fontawesome_icon = '';
            foreach ($icons_1 as $key => $value) {
                $custom_icon .= '<li data-type="custom"><i class="' . $value . '"></i></li>';
            }
            foreach ($icons_2 as $key => $value) {
                $fontawesome_icon .= '<li data-type="fontawesome"><i class="fa ' . $key . '"></i></li>';
            }
            return '<tr' . $row_ID . '>
                     <td><label for="' . $panel['name'] . '">' . $panel['label'] . '</label></td>
                     <td>
                        <div class="panel-icons">
                           <span class="' . $panel['value'] . '"></span>
                           <input type="text" name="' . $panel['name'] . '" id="' . $panel['name'] . '" value="' . $panel['value'] . '" style="direction:ltr;" placeholder="' . esc_html__('icon-name', 'kud') . '">
                           <button type="button" data-id="#' . $panel['name'] . '">' . esc_html__('chose icon', 'kud') . ' <i class="fa fa-sort-down"></i> </button>
                               <div>
                                    <h4>' . esc_html__('custom icons', 'kud') . '</h4>
                                    <ul>
                                        ' . $custom_icon . '
                                    <lul>
                                    <h4>' . esc_html__('fontawesome icons', 'kud') . '</h4>
                                    <ul>
                                        ' . $fontawesome_icon . '
                                    <lul>
                               </div>
                        </div>
                    </td>
                 </tr>';
            break;

        case 'spinner':
            return '<tr' . $row_ID . '>
                     <td><label for="' . $panel['name'] . '">' . $panel['label'] . '</label></td>
                     <td><input class="spinner" name="' . $panel['name'] . '" id="' . $panel['name'] . '" data-min="' . $panel['min'] . '" data-max="' . $panel['max'] . '" data-step="' . $panel['step'] . '" value="' . $panel['value'] . '"></td>
                 </tr>';
            break;

        case 'slider':
            return '<tr' . $row_ID . '>
                     <td><label for="' . $panel['name'] . '">' . $panel['label'] . '</label></td>
                     <td><div class="panel-slider"><div class="slider" data-id="#' . $panel['name'] . '"></div><input type="text" name="' . $panel['name'] . '" id="' . $panel['name'] . '" value="' . $panel['value'] . '" data-min="' . $panel['min'] . '" data-max="' . $panel['max'] . '" data-step="' . $panel['step'] . '"></div></td>
                 </tr>';
            break;

        case 'checkbox-toggle':
            return '<tr' . $row_ID . '>
                     <td><labe>' . $panel['label'] . '</label></td>
                     <td><label class="panel-checkbox"><input type="hidden" name="' . $panel['name'] . '" id="' . $panel['name'] . '" value="' . $panel['value'] . '"></label></td>
                 </tr>';
            break;

        case 'radiobox-toggle':
            return '<tr' . $row_ID . '>
                     <td><label>' . $panel['label'] . '</label></td>
                     <td><label class="panel-radio"><input type="radio" name="' . $panel['name'] . '" id="' . $panel['name'] . '" ' . getchecked($panel['value'], $panel['default']) . ' value="' . $panel['value'] . '"></label></td>
                 </tr>';
            break;

        case 'radiobox-list':
            $list = '';
            if (isset($panel['list']) and is_array($panel['list'])) {
                foreach ($panel['list'] as $key => $value) {
                    $list .= '<p><label class="panel-radio">
                                <input type="radio" name="' . $panel['name'] . '" id="' . $panel['name'] . '_' . $key . '" ' . getchecked($key, $panel['default']) . ' value="' . $key . '">
                            </label> <span><label for="' . $panel['name'] . '_' . $key . '">' . $value . '</label></span></p>';
                }
            }
            return '<tr' . $row_ID . '>
                     <td><label>' . $panel['label'] . '</label></td>
                     <td>' . $list . '</td>
                 </tr>';
            break;

        case 'select':
            $option = '';
            if ($panel['options']) {
                foreach ($panel['options'] as $key => $value) {
                    $option .= '<option value="' . $key . '" ' . getselected($key, $panel['value']) . '>' . $value . '</option>';
                }
            }
            return '<tr' . $row_ID . '>
                     <td><label for="' . $panel['name'] . '">' . $panel['label'] . '</label></td>
                     <td>
                        <label class="select">
                           <select name="' . $panel['name'] . '" id="' . $panel['name'] . '">'
                    . $option .
                    '</select>
                        </label>
                     </td>
                 </tr>';
            break;

        case 'select-taxonomy':
            $option = '<option value="0" ' . getselected('0', $panel['value']) . '>' . esc_html__('Select All', 'kud') . '</option>';
            $taxonomy = (isset($panel['taxonomy']) and ! empty($panel['taxonomy'])) ? $panel['taxonomy'] : 'category';
            $showcats = get_terms($taxonomy, array('hide_empty' => false));
            $return = isset($panel['return']) ? $panel['return'] : 'id';
            $type = 'term_id';
            if ($return == 'id') {
                $type = 'term_id';
            } else if ($return == 'slug') {
                $type = 'slug';
            }
            //$showcats = get_categories('hide_empty=0');
            foreach ($showcats as $cat) {
                $option .= '<option value="' . $cat->$type . '" ' . getselected($cat->$type, $panel['value']) . '>' . $cat->name . '</option>';
            }
            return '<tr' . $row_ID . '>
                     <td><label for="' . $panel['name'] . '">' . $panel['label'] . '</label></td>
                     <td>
                        <label class="select">
                           <select name="' . $panel['name'] . '" id="' . $panel['name'] . '">'
                    . $option .
                    '</select>
                        </label>
                     </td>
                 </tr>';
            break;

        case 'select-pages':
            $option = '';
            $pages = get_pages(array('post_type' => 'page'));
            foreach ($pages as $page) {
                $option .= '<option value="' . $page->ID . '" ' . getselected($page->ID, $panel['value']) . '>' . $page->post_title . '</option>';
            }
            return '<tr' . $row_ID . '>
                     <td><label for="' . $panel['name'] . '">' . $panel['label'] . '</label></td>
                     <td>
                        <label class="select">
                           <select name="' . $panel['name'] . '" id="' . $panel['name'] . '">'
                    . $option .
                    '</select>
                        </label>
                     </td>
                 </tr>';
            break;

        case 'taxonomy-checkbox-list':
            $taxonomy = (isset($panel['taxonomy']) and ! empty($panel['taxonomy'])) ? $panel['taxonomy'] : 'category';
            $list = '';
            $showcats = get_terms($taxonomy, array('hide_empty' => false));
            //var_dump($showcats);
            //$showcats = get_categories('hide_empty=0');
            foreach ($showcats as $cat) {
                $list .= '<li><label><input type="checkbox" ' . array_checked($panel['value'], $cat->term_id) . ' id="' . $panel['name'] . '_' . $cat->term_id . '" name="' . $panel['name'] . '[' . $cat->slug . ']" value="' . $cat->term_id . '">' . $cat->name . ' </label></li>';
            }
            return '<tr' . $row_ID . '>
                     <td colspan="2">
                        <div class="categories-checkbox-list">
                        <h4>' . $panel['label'] . ' <a class="checked-all">' . esc_html__('Select All', 'kud') . '</a></h4>
                            <ul>
                              ' . $list . '
                            </ul>
                        </div>
                     </td>
                 </tr>';
            break;
            break;

        case 'chose-color':
            $colors = '';
            if ($panel['colors']) {
                foreach ($panel['colors'] as $color) {
                    $colors .= '<a data-color="' . $color . '"></a>';
                }
            }
            return '<tr' . $row_ID . '>
                     <td><label for="' . $panel['name'] . '">' . $panel['label'] . '</label></td>
                     <td>
                        <div class="panel-color">
                        ' . $colors . '
                            <input type="hidden" name="' . $panel['name'] . '" id="' . $panel['name'] . '" value="' . $panel['value'] . '">
                        </div>
                     </td>
                 </tr>';
            break;

        case 'mini-colors':
            return '<tr' . $row_ID . '>
                     <td><label for="' . $panel['name'] . '">' . $panel['label'] . '</label></td>
                     <td><input type="text" name="' . $panel['name'] . '" class="minicolors" id="' . $panel['name'] . '" value="' . $panel['value'] . '"></td>
                 </tr>';
            break;
    }
}
