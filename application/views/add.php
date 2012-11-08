<div class="container">

<div class="span-18">
    <div class="span-5">

 <fieldset class="formee">
    <ul id="product_grid" class="formee">
            
               
                <a href="/products/view/asin/<?= $products[0]['asin']; ?>">
                <img src="<?= $products[0]['medium']; ?>" class="game_cover" alt="" />
                </a>
                <br/>
                <br/>
                <h2><a href="/products/view/asin/<?= $products[0]['asin']; ?>"><?= $products[0]['name']; ?></a></h2>

               
                
    </ul>
</div>
  <div class="span-10" >
 <?=  form_open('piypa/add/asin/'.$products[0]['asin'], $attributes); ?>


<fieldset> 
<label>Please make some decisions</label>

<?= form_dropdown('pricing', $pricing_options); ?>

</p>
<p>
       <input type="text" size="7" name="price" id="costValue" value="" style="display:none"> 
<p>




<select name="category" id="category">
    <option value="3" label="Choose category" selected="selected">Choose category</option>
    <option value="4" label="Tutorial">Tutorial</option>
</select></p>

<p> 
      

        <?= form_dropdown('language', $language_options); ?>

</p>

<p>
<label>piypas' title</label>

<?=  form_input($title_input)  ?></p>

<p>
<label>piypas' tags</label> 

<?=  form_input($tags_input)  ?></p>
<p>


<p>
    <label>piypas' abstract</label>
    <?=  form_textarea($abstract_textarea)  ?></p>
<p>


    <div id="queue"></div>
        <input id="file_upload" name="file_upload" type="file" multiple="true">

    </p>
    <p>

<dt id="public-label">

    <label for="public" class="optional">please publish my piyp</label></dt>

<input type="hidden" name="public" value="0">
<input type="checkbox" name="public" id="public" value="1" checked="checked">
</p>

<p>

    <input type="submit" name="submit" id="submit" value="change my piyp, now!"></p>
    </fieldset>
    </form>

    <script type="text/javascript">
        <?php $timestamp = time();?>
        $(function() {
            $('#file_upload').uploadify({
                'formData'     : {
                    'timestamp' : '<?php echo $timestamp;?>',
                    'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
                },
                'swf'      : '/uploadify/uploadify.swf',
                'uploader' : '/uploadify/uploadify.php'
            });
        });
    </script>

        



</div>
</div>
</div>
