<?php 
/**
 * @name Form generation class.
 * @author Sasha Khamkov
 * @copyright 2009 (c) Sasha Khamkov <sanusart@gmail.com>
 * @return string of formated html
 * @version 1.0
 * @license GNU General Public License
 
 *************************************************************************
 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 
 You should have received a copy of the GNU General Public License
 along with this program.  If not, see <http://www.gnu.org/licenses/>.
 
 **************************************************************************/

class form {

    private $out;
    private $printout;
    /**
     * Main constructor.
     * @return string
     */
    function __construct() {
        $this->printout;
    }
    /**
     * Creates of <input /> control.
     * @param $type
     * @param $style
     * @param $class
     * @param $name
     * @param $value
     * @param $id
     * @param $src
     * @param $checked
     * @param $disabled
     * @return string
     */
    function input($type, $style, $class, $name, $value, $id, $src = false, $checked = false, $disabled = false) {
        $this->out .= "\t\t".'<input type="'.$type.'" ';
        ($style == false) ? $this->out .= '' : $this->out .= 'style="'.$style.'" ';
        ($class == false) ? $this->out .= '' : $this->out .= 'class="'.$class.'" ';
        ($name == false) ? $this->out .= '' : $this->out .= 'name="'.$name.'" ';
        ($value == false) ? $this->out .= '' : $this->out .= 'value="'.$value.'" ';
        ($type == 'text' || $type == 'password') ? $this->out .= 'onBlur="this.value=\''.$value.'\'" onFocus="this.value=\'\'" ' : $this->out .= '';
        ($src == 'image') ? $this->out .= '' : $this->out .= 'src="'.$src.'" ';
        ($id == false) ? $this->out .= '' : $this->out .= 'id="'.$id.'" ';
        ($checked == false) ? $this->out .= '' : $this->out .= 'checked="checked" ';
        ($disabled == false) ? $this->out .= '' : $this->out .= 'disabled="'.$disabled.'" ';
        $this->out .= '/>'."\n";
        return true;
    }
    /**
     * Creates of <label></label> form control.
     * @param $for
     * @param $label
     * @return string
     */
    function label($for, $label) {
        $this->out .= "\t".'<label for="'.$for.'">'.$label.'</label>'."\n";
        return true;
    }
    /**
     * Creates opening instance of <fieldset> + <legend> form control.
     * @param $legend
     * @param $fieldset_style
     * @param $fieldset_class
     * @param $legend_style
     * @param $legend_class
     * @return string (partial)
     */
    function field_open($legend, $fieldset_style, $fieldset_class, $legend_style, $legend_class) {
        $this->out .= "\t".'<fieldset ';
        ($fieldset_style == false) ? $this->out .= 'style="-moz-border-radius:5px;-webkit-border-radius: 5px;"' : $this->out .= 'style="'.$fieldset_style.'" ';
        ($fieldset_class == false) ? $this->out .= '' : $this->out .= 'class="'.$fieldset_class.'" ';
        $this->out .= '>'."\n"."\t\t\t".'<legend ';
        ($legend_style == false) ? $this->out .= '' : $this->out .= 'style="'.$legend_style.'" ';
        ($legend_class == false) ? $this->out .= '' : $this->out .= 'class="'.$legend_class.'" ';
        $this->out .= '>'.$legend.'</legend>'."\n";
        return true;
    }
    /**
     * Creates closing instance of </fieldset> form control.
     * @return string (partial)
     */
    function field_close() {
        $this->out .= "\t".'</fieldset>'."\n";
        return true;
    }
    /**
     * Creates instance of <textarea></textarea> form control.
     * @param $cols
     * @param $rows
     * @param $style
     * @param $class
     * @param $name
     * @param $id
     * @param $value
     * @return string
     */
    function textarea($cols, $rows, $style, $class, $name, $id, $value) {
        $this->out .= "\t\t".'<textarea ';
        ($cols == false) ? $this->out .= '' : $this->out .= 'cols="'.$cols.'" ';
        ($rows == false) ? $this->out .= '' : $this->out .= 'rows="'.$rows.'" ';
        ($style == false) ? $this->out .= '' : $this->out .= 'style="'.$style.'" ';
        ($class == false) ? $this->out .= '' : $this->out .= 'class="'.$class.'" ';
        ($name == false) ? $this->out .= '' : $this->out .= 'name="'.$name.'" ';
        ($id == false) ? $this->out .= '' : $this->out .= 'id="'.$id.'" ';
        $this->out .= '>'."\n";
        ($value == false) ? $this->out .= '' : $this->out .= $value;
        $this->out .= "\n\t\t".'</textarea>'."\n";
        return true;
    }
    /**
     * Creates instance of <select><option></option></select> form control.
     * @param $id
     * @param $class
     * @param $name
     * @param $style
     * @param $options - accepts parameters as `|` (pipe) seperated values e.g. val1|val2|val3| etc. For selected="selected" - use `*` sign as of val1|val2|*val3|val4
     * @return string
     */
    function select($id, $class, $name, $style, $options = array()) {
        $this->out .= "\t\t".'<select ';
        ($id == false) ? $this->out .= '' : $this->out .= 'id="'.$id.'" ';
        ($class == false) ? $this->out .= '' : $this->out .= 'class="'.$class.'" ';
        ($name == false) ? $this->out .= '' : $this->out .= 'name="'.$name.'" ';
        ($style == false) ? $this->out .= '' : $this->out .= 'style="'.$style.'" ';
        $this->out .= '>'."\n";
        $option = explode('|', $options);
        foreach ($option as $value) {
            $this->out .= "\t\t\t".'<option ';
            (!strstr($value, '*')) ? $this->out .= 'value="'.$value.'">'.$value.'</option>'."\n" : $this->out .= 'selected="selected" value="'.str_replace('*', '', $value).'">'.str_replace('*', '', $value).'</option>'."\n";
            // $value = str_replace('#','',$value);
            // $this->out .= 'value="'.$value.'">'.$value.'</option>'."\n";
        }
        $this->out .= "\t\t".'</select>'."\n";
    }
    /**
     * Creates instance of <button></button> form control.
     * Please NOTE: This control is somewhat buggy in IE. Use `input type="submit"` for form submission.
     * @param $type
     * @param $id
     * @param $class
     * @param $style
     * @param $value
     * @return string
     */
    function button($type = 'button', $id, $class, $style, $value = 'CLICKME') {
        $this->out .= "\t\t".'<button ';
        ($type == false) ? $this->out .= '' : $this->out .= 'type="'.$type.'" ';
        ($id == false) ? $this->out .= '' : $this->out .= 'id="'.$id.'" ';
        ($class == false) ? $this->out .= '' : $this->out .= 'class="'.$class.'" ';
        ($style == false) ? $this->out .= '' : $this->out .= 'style="'.$style.'" ';
        $this->out .= '>'.$value."\t\t".'</button>."\n"';
        return true;
    }
    function required($color = '#cc0000') {
        $this->out .= '<small style="cursor:help;color:'.$color.';"><abbr title="Required field."><b>*</b></abbr></small>';
    }
    /**
     * Creates instance of <br /> - xHTML new line control.
     * @param $num - how many times to repeat the <br /> - if $num='3' - returns <br /><br /><br />.
     * @return string
     */
    function br($num) {
        $this->out .= str_repeat('<br />'."\n", $num);
        return true;
    }
    /**
     * Creates and constructs the form.
     * @param $action
     * @param $method
     * @param $charset
     * @param $class
     * @param $style
     * @param $id
     * @return string
     */
    function printout($action, $method = 'post', $charset = 'utf-8', $class, $style, $id) {
        $form = '<form action="'.$action.'" method="'.$method.'" accept-charset="'.$charset.'">'."\n";
        $form .= $this->out;
        $form .= '</form>';
        echo $form;
    }
}
?>

