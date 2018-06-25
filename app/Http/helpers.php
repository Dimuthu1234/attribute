<?php

function currency($value) {
    return 'Rs.&nbsp;'.number_format(round($value, 2), 2);
}

function percentage($value) {
    return round($value, 2) * 100 . "%";
}

function resourceNames($name)
{
    return [
        'names' => [
            'store'     => $name . '.store',
            'index'     => $name . '.index',
            'create'    => $name . '.create',
            'update'    => $name . '.update',
            'show'      => $name . '.show',
            'destroy'   => $name . '.destroy',
            'edit'      => $name . '.edit'
        ]
    ];
}

function getLabels($items, $field = 'name', $class = 'label label-default')
{
    $html = '';

    foreach($items as $item)
        $html .= '<span class="'.$class.'">'.$item->$field.'</span> ';

    return $html;
}

function getLabel($object, $class = '')
{
    return '<label class="label label-default '.$class.'" style="background: '.$object->color.'">'.$object->name.'</label>';

}

function getColorBox($color = '#06f')
{
    return '<span class="icon is-small"><i class="fa fa-square" aria-hidden="true" style="color: '.$color.'"></i></span>';
}

function getBoolSymbol($bool = false)
{
    return ($bool) ? '<span class="icon is-small"><i class="fa fa-check text-success" aria-hidden="true"></i></span>'
                   : '<span class="icon is-small"><i class="fa fa-times text-danger" aria-hidden="true"></i></span>';
}

function getModifyButton($url, $class, $text = '', $options = [])
{
    if($text != '')
        $text = ' &nbsp; '.$text;

    $button = '<a href="' . $url . '" class="button is-small"';
    foreach($options as $attr => $value) {
        $button .= ' ' . $attr . '="' . $value . '"';
    }
    $button .= '><span class="icon is-small"><i class="fa ' . $class . '"></i></span></a>';

    return $button;
}

function getModifyButtonTwo($url, $text = '', $options = [])
{
    if($text != '')
        $text = ''.$text;

    $button = '<a href="' . $url . '" class="button is-light is-small"';
    foreach($options as $attr => $value) {
        $button .= ' ' . $attr . '="' . $value . '"';
    }
    $button .= '>'.$text.'</a>';

    return $button;
}

function getDeleteButton($url, $text = '')
{
    if($text != '')
        $text = ' &nbsp; '.$text;

    $html =
        '<form class="delete-form" action="'.$url.'" method="POST">
            <input type="hidden" name="_method" value="DELETE">'.
            csrf_field()
            .'<button type="submit" class="button is-danger is-small is-outlined">
                <span class="icon is-small">
                    <i class="fa fa-trash"></i>
                </span>
            </button>
        </form>';

    return $html;
}

function getDeleteButtonTwo($url, $text = '')
{
    if($text != '')
        $text = ''.$text;

    $html =
        '<form class="delete-form" action="'.$url.'" method="POST">
            <input type="hidden" name="_method" value="DELETE">'.
        csrf_field()
        .'<button type="submit" class="button is-light is-small">'.$text.'</button>
        </form>';

    return $html;
}

function getPercentageString($value) {
    return round($value * 100) . '%';
}
