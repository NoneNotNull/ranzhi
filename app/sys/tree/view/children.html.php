<?php
/**
 * The children view of tree module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     tree
 * @version     $Id: children.html.php 4108 2016-10-08 06:07:30Z daitingting $
 * @link        http://www.ranzhico.com
 */
?>
<form method='post' class='form-horizontal' id='childForm' action="<?php echo inlink('children', "type=$type&category=$parent&root=$root");?>">
  <div class='panel'>
    <div class='panel-heading'>
    <strong><?php echo $parent ? $lang->category->children . ' <i class="icon-double-angle-right"></i> ' : $lang->category->common; ?></strong>
    <?php
    foreach($origins as $origin)
    {
        echo html::a(inlink('browse', "type=$type&&category=$origin->id"), $origin->name . " <i class='icon-angle-right text-muted'></i> ");
    }
    ?>
    </div>

    <div class='panel-body' id='childList'>
      <?php
      $maxID = 0;
      foreach($children as $child)
      {
          if($maxID < $child->id) $maxID = $child->id;
          $disabled = !$child->major ? '' : ($child->major < 5 ? "disabled='disabled'" : "readonly='readonly'");
          echo (!$child->major or $child->major > 4) ? "<div class='form-group category'>" : "<div class='form-group'>";
          echo "<div class='col-xs-6 col-md-4 col-md-offset-2'>" . html::input("children[$child->id]", $child->name, "class='form-control' $disabled") . "</div>";
          if(!$child->major or $child->major > 4) echo "<div class='col-xs-6 col-md-2'><i class='icon-move sort-handle'></i></div>";
          echo html::hidden("mode[$child->id]", 'update', "$disabled");
          echo "</div>";
      }

      for($i = 0; $i < TREE::NEW_CHILD_COUNT ; $i ++)
      {
          echo "<div class='form-group category'>";
          echo "<div class='col-xs-6 col-md-4 col-md-offset-2'>" . html::input("children[]", '', "class='form-control' placeholder='{$this->lang->category->common}'") . "</div>";
          echo "<div class='col-xs-6 col-md-2'><i class='icon-move sort-handle'></i></div>";
          echo html::hidden('mode[]', 'new');
          echo "</div>";
      }

      if(($type == 'forum') and ($boardChildrenCount == 0))
      {
          echo "<div class='form-group'><div class='col-xs-6 col-md-4 col-md-offset-2'><div class='alert alert-warning mg-0'>{$this->lang->board->placeholder->setChildren}</div></div></div>";
      }

      $button = ($type == 'dept') ? html::submitButton() . html::backButton() : html::submitButton();
      echo "<div class='form-group'><div class='col-xs-8 col-md-offset-2'>" . $button . "</div></div>";
      echo html::hidden('parent',   $parent);
      ?>
    </div>
  </div>
</form>
<?php js::set('maxID', $maxID);?>
<?php if(isset($pageJS)) js::execute($pageJS);?>
