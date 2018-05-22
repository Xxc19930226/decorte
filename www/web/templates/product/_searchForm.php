<?php echo $form->renderFormTag(url_for('product_search'), array('id' => 'search_form', 'class' => 'form', 'method' => 'get')) ?>
    <p class="form__title">搜索条件</p>
    <table>
        <tr>
            <th class="form__th">类别</th>
            <td>
               <?php echo $form['category']->render(array('class' => 'form__select')) ?>
               <?php echo $form['sub_category']->render(array('class' => 'form__select')) ?>
            </td>
        </tr>
        <tr>
            <th class="form__th">产品系列</th>
            <td>
                <?php echo $form['line']->render(array('class' => 'form__select')) ?>
            </td>
        </tr>
        <tr>
            <th class="form__th">功能</th>
            <td>
                <?php echo $form['effect']->render(array('class' => 'form__select')) ?>
            </td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td>
                <?php echo $form['keyword']->render(array('class' => 'form__input-text')) ?><input type="hidden" name="page" value="1" /><?php echo tag('input', array('type' => 'hidden', 'name' => 'log', 'value' => $form->getLogId()), false) ?>
            </td>
        </tr>
    </table>
    <input type="submit" value="再次搜索" class="form__input-submit">
</form>

<script type="text/javascript">
	$(document).ready(function() {
        $('#category, #sub_category, #line, #effect').change(function() {
        	var f = $('#search_form');
        	$.ajax({
                url: f.prop('action'),
                type: f.prop('type'),
                data: f.serialize(),
                timeout: 10000,
                dataType: 'html',
                success: function(data, textStatus) {
                    $('.search__narrowdown__form').html(data);
                }
            });
        });
    });
</script>
<p class="search__narrowdown__closer">× 关闭</p>
